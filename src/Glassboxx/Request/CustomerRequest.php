<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\Traits\UsesAuthTokenTrait;
use Opdavies\Glassboxx\ValueObject\CustomerInterface;

final class CustomerRequest extends AbstractRequest
{
    use UsesAuthTokenTrait;

    public const ENDPOINT = '/glassboxxorder/customCustomer';

    /** @var string */
    protected $authToken;

    /** @var CustomerInterface */
    protected $customer;

    public function forCustomer(CustomerInterface $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function execute(): string
    {
        $body = [
            'customer' => [
                'created_in' => $this->config->getVendorId(),
                'email' => $this->customer->getEmailAddress(),
                'firstname' => $this->customer->getFirstName(),
                'lastname' => $this->customer->getLastName(),
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

        return json_decode($response->getContent());
    }
}
