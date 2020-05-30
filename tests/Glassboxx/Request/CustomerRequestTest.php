<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\Glassboxx\Request;

use Opdavies\Glassboxx\Request\AuthTokenRequestInterface;
use Opdavies\Glassboxx\Request\CustomerRequest;
use Opdavies\Glassboxx\Tests\Glassboxx\TestCase;
use Opdavies\Glassboxx\ValueObject\CustomerInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class CustomerRequestTest extends TestCase
{
    public function testThatItCreatesACustomer(): void
    {
        $authTokenRequest = $this->getMockBuilder(AuthTokenRequestInterface::class)
            ->getMock();
        $authTokenRequest->expects($this->any())
            ->method('getToken')
            ->willReturn('testtoken');

        $response = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();
        $response->method('getContent')->willReturn('"Success"');

        $client = $this->getMockBuilder(MockHttpClient::class)->getMock();
        $client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                CustomerRequest::BASE_URL
                .CustomerRequest::ENDPOINT,
                [
                    'auth_bearer' => $authTokenRequest->getToken(),
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'body' => json_encode([
                        'customer' => [
                            'created_in' => 123,
                            'email' => 'oliver@oliverdavies.uk',
                            'firstname' => 'Oliver',
                            'lastname' => 'Davies',
                        ],
                    ]),
                ]
            )
            ->willReturn($response);

        $customer = $this->getMockBuilder(CustomerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $customer->method('getFirstName')->willReturn('Oliver');
        $customer->method('getLastName')->willReturn('Davies');
        $customer->method('getEmailAddress')->willReturn('oliver@oliverdavies.uk');

        $request = (new CustomerRequest($client))
            ->forCustomer($customer)
            ->withAuthToken($authTokenRequest->getToken())
            ->withConfig($this->config);

        $this->assertSame('Success', $request->execute());
    }
}
