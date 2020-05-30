<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\Glassboxx\Request;

use Opdavies\Glassboxx\Request\AuthTokenRequest;
use Opdavies\Glassboxx\Tests\Glassboxx\TestCase;
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
                AuthTokenRequest::BASE_URL
                .AuthTokenRequest::ENDPOINT,
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
