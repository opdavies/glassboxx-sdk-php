<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\Enum\InteractionType;
use Opdavies\Glassboxx\Traits\UsesAuthTokenTrait;
use Opdavies\Glassboxx\Traits\UsesCreatedAtTrait;
use Opdavies\Glassboxx\ValueObject\OrderInterface;

class OrderRequest extends AbstractRequest implements OrderRequestInterface
{
    use UsesCreatedAtTrait;
    use UsesAuthTokenTrait;

    /** @var OrderInterface */
    private $order;

    public function forOrder(OrderInterface $order): AbstractRequest
    {
        $this->order = $order;

        return $this;
    }

    public function execute(): string
    {
        $body = [
            'items' => [
                [
                    'created_at' => $this->getCreatedAtDate(),
                    'currency_code' => $this->order->getCurrencyCode(),
                    'customer_email' => $this->order->getCustomer()->getEmailAddress(),
                    'customer_firstname' => $this->order->getCustomer()->getFirstName(),
                    'customer_lastname' => $this->order->getCustomer()->getLastName(),
                    'discount_amount' => 0,
                    'duration_for_loan' => 0,
                    'hostname' => $this->config->getVendorId(),
                    'original_order_number' => $this->order->getOrderNumber(),
                    'price_incl_tax' => $this->order->getPrice(),
                    'sku' => $this->order->getSku(),
                    'type_of_interaction' => InteractionType::PURCHASE,
                ],
            ],
        ];

        $response = $this->client->request(
            'POST',
            self::BASE_URL . self::ENDPOINT,
            [
                'auth_bearer' => $this->authToken,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => json_encode($body),
            ]
        );

        return $response->getContent(false);
    }
}
