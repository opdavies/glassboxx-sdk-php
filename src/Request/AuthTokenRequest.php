<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use RuntimeException;

final class AuthTokenRequest extends AbstractRequest implements AuthTokenRequestInterface
{
    public function getToken(): string
    {
        if (!$this->config) {
            throw new RuntimeException('There is no config');
        }

        $response = $this->client->request(
            'POST',
            self::ENDPOINT,
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
