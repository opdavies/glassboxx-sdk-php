<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

final class AuthTokenRequest extends AbstractRequest implements AuthTokenRequestInterface
{
    public function getToken(): string
    {
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
