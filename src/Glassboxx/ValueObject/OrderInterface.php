<?php

namespace Opdavies\Glassboxx\ValueObject;

interface OrderInterface
{
    public function __construct(
        CustomerInterface $customer,
        string $sku,
        string $orderNumber,
        string $currencyCode,
        float $price
    );

    public function getCurrencyCode(): string;

    public function getCustomer(): CustomerInterface;

    public function getOrderNumber(): string;

    public function getPrice(): float;

    public function getSku(): string;
}
