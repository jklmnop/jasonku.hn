<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpamChecker
{
    public const HAM = 0;

    public const SPAMAYBE = 1;

    public const SPAM = 2;

    private readonly string $endpoint;

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        #[Autowire('%env(AKISMET_KEY)%')]
        string $akismetKey,
        #[Autowire('%env(APP_ENV)%')]
        private readonly string $appEnv,
    ) {
        $this->endpoint = sprintf('https://%s.rest.akismet.com/1.1/comment-check', $akismetKey);
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

        $response = $this->httpClient->request('POST', $this->endpoint, [
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
