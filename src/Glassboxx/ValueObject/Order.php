<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\ValueObject;

final class Order implements OrderInterface
{
    /** @var CustomerInterface */
    private $customer;

    /** @var string */
    private $orderNumber;

    /** @var string */
    private $currencyCode;

    public function __construct(
        CustomerInterface $customer,
        string $orderNumber,
        string $currencyCode
    ) {
        $this->customer = $customer;
        $this->orderNumber = $orderNumber;
        $this->currencyCode = $currencyCode;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function getCustomer(): CustomerInterface
    {
        return $this->customer;
    }

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }
}
