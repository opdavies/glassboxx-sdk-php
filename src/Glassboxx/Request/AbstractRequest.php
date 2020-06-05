<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\Config;
use Opdavies\Glassboxx\Traits\UsesConfigTrait;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractRequest
{
    use UsesConfigTrait;

    public const BASE_URL = 'https://server.glassboxx.co.uk';

    /** @var HttpClient */
    protected $client;

    public function __construct(HttpClientInterface $client = null)
    {
        if (!$client) {
            $client = HttpClient::createForBaseUri(self::BASE_URL);
        }

        $this->client = $client;
    }
}
