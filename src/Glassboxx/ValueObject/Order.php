<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\ValueObject;

final class Order implements OrderInterface
{
    /** @var CustomerInterface */
    private $customer;

    /** @var string */
    private $sku;

    /** @var string */
    private $orderNumber;

    /** @var string */
    private $currencyCode;

    /** @var float */
    private $price;

    public function __construct(
        CustomerInterface $customer,
        string $sku,
        string $orderNumber,
        string $currencyCode,
        float $price
    ) {
        $this->customer = $customer;
        $this->sku = $sku;
        $this->orderNumber = $orderNumber;
        $this->currencyCode = $currencyCode;
        $this->price = $price;
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

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getSku(): string
    {
        return $this->sku;
    }
}
