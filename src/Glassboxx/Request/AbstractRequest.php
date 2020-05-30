<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\Config;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractRequest
{
    public const BASE_URL = 'https://server.glassboxx.co.uk/rest/V1';

    /** @var HttpClient */
    protected $client;

    /** @var Config */
    protected $config;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function withConfig(Config $config): AbstractRequest
    {
        $this->config = $config;

        return $this;
    }
}
