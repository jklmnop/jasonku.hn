<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpamChecker
{
    private string $endpoint = 'https://%s.rest.akismet.com/1.1/comment-check';

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        #[Autowire('%env(AKISMET_KEY)%')]
        private readonly string $akismetKey,
        #[Autowire('%env(APP_ENV)%')]
        private readonly string $appEnv,
    ) {
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getSpamScore(string $message, Request $request): SpamCheckerResultEnum
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

        $response = $this->httpClient->request('POST', sprintf($this->endpoint, $this->akismetKey), [
            'body' => $payload,
        ]);

        $headers = $response->getHeaders();
        if ('discard' === ($headers['x-akismet-pro-tip'][0] ?? '')) {
            return SpamCheckerResultEnum::SPAM;
        }

        $content = $response->getContent();
        if (isset($headers['x-akismet-debug-help'][0])) {
            throw new \RuntimeException(sprintf('Unable to check for spam: %s (%s).', $content, $headers['x-akismet-debug-help'][0]));
        }

        return 'true' === $content ? SpamCheckerResultEnum::SPAMAYBE : SpamCheckerResultEnum::HAM;
    }
}
