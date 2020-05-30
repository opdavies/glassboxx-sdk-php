<?php

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\Config;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class AuthTokenAbstractRequest extends AbstractRequest
{
    public const ENDPOINT = '/integration/admin/token';

    /** @var Config */
    private $config;

    /** @var HttpClient */
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function withConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }

    public function getToken(): string
    {
        $response = $this->client
            ->request(
                'POST',
                self::BASE_URL.self::ENDPOINT,
                [
                    'query' => [
                        'password' => $this->config->getPassword(),
                        'username' => $this->config->getUsername(),
                    ],
                ]
            );

        return json_decode($response->getContent());
    }
}
