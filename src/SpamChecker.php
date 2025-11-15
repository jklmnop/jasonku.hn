<?php
namespace App;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpamChecker
{
    const HAM = 0;
    const SPAMAYBE = 1;
    const SPAM = 2;

    private string $endpoint;

    private string $appEnv;

    public function __construct(
        private readonly HttpClientInterface $client,
        #[Autowire('%env(AKISMET_KEY)%')] string $akismetKey,
        #[Autowire('%env(APP_ENV)%')] string $appEnv,
    ) {
        $this->endpoint = sprintf('https://%s.rest.akismet.com/1.1/comment-check', $akismetKey);
        $this->appEnv = $appEnv;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getSpamScore(string $message, Request $request): int
    {
        $payload = [
            'user_ip' => $request->getClientIp(),
            'user_agent' => $request->headers->get('user-agent'),
            'referrer' => $request->headers->get('referer'),
            'permalink' => $request->getUri(),
            'blog' => $request->headers->get('referer'),
            'comment_type' => 'comment',
            'comment_content' => $message,
            'is_test' => $this->appEnv === 'dev',
        ];

        $response = $this->client->request('POST', $this->endpoint, [
            'body' => $payload,
        ]);

        $headers = $response->getHeaders();
        if ('discard' === ($headers['x-akismet-pro-tip'][0] ?? '')) {
            return self::SPAM;
        }

        $content = $response->getContent();
        if (isset($headers['x-akismet-debug-help'][0])) {
            throw new \RuntimeException(sprintf('Unable to check for spam: %s (%s).', $content, $headers['x-akismet-debug-help'][0]));
        }

        return 'true' === $content ? self::SPAMAYBE : self::HAM;
    }
}
