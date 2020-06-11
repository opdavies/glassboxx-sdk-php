<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\Request;

use Opdavies\Glassboxx\Request\AuthTokenRequest;
use Opdavies\Glassboxx\Tests\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class AuthTokenRequestTest extends TestCase
{
    public function testThatItGetsAnAuthCode(): void
    {
        $response = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();
        $response->method('getContent')->willReturn('"abc123"');

        $client = $this->getMockBuilder(MockHttpClient::class)->getMock();
        $client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                AuthTokenRequest::ENDPOINT,
                [
                    'query' => [
                        'password' => 'secret',
                        'username' => 'opdavies',
                    ],
                ]
            )
            ->willReturn($response);

        $token = (new AuthTokenRequest($client))
            ->withConfig($this->config)
            ->getToken();

        $this->assertSame('abc123', $token);
    }
}
