<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\Glassboxx\Request;

use DateTime;
use Opdavies\Glassboxx\Request\OrderRequest;
use Opdavies\Glassboxx\Tests\Glassboxx\TestCase;
use Opdavies\Glassboxx\ValueObject\OrderItemInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

final class OrderRequestTest extends TestCase
{
    public function testThatItCreatesAnOrder(): void
    {
        $body = [
            'items' => [
                [
                    'created_at' => '2020-06-04 12:00:00',
                    'currency_code' => 'GBP',
                    'customer_email' => 'oliver@oliverdavies.uk',
                    'customer_firstname' => 'Oliver',
                    'customer_lastname' => 'Davies',
                    'discount_amount' => 0,
                    'duration_for_loan' => 0,
                    'hostname' => 123,
                    'original_order_number' => 'abc123',
                    'price_incl_tax' => 7.99,
                    'sku' => 'this-is-the-first-sku',
                    'type_of_interaction' => 'purchase',
                ],
            ],
        ];

        $response = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $response->method('getContent')->willReturn(json_encode($body));

        $authTokenRequest = $this->getMockAuthTokenRequest();

        $client = $this->getMockBuilder(MockHttpClient::class)->getMock();
        $client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                OrderRequest::ENDPOINT,
                [
                    'auth_bearer' => $authTokenRequest->getToken(),
                    'headers' => [
                        'Content-Type' => 'application/json',
                    ],
                    'body' => json_encode($body),
                ]
            )
            ->willReturn($response);

        $request = (new OrderRequest($client))
            ->forOrder($this->getMockOrder())
            ->withOrderItems([$this->getMockOrderItem()])
            ->withAuthToken($authTokenRequest->getToken())
            ->withConfig($this->config)
            ->setCreatedDate('2020-06-04 12:00:00');

        // A successful response returns the original body.
        $this->assertSame(json_encode($body), $request->execute());
    }

    private function getMockOrderItem(): OrderItemInterface
    {
        $orderItem = $this->getMockBuilder(OrderItemInterface::class)
            ->getMock();
        $orderItem->method('getPrice')->willReturn(7.99);
        $orderItem->method('getSku')->willReturn('this-is-the-first-sku');

        return $orderItem;
    }
}
