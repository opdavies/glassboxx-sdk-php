<?php

namespace Opdavies\Glassboxx\ValueObject;

interface OrderInterface
{
    public function __construct(
        CustomerInterface $customer,
        string $orderNumber,
        string $currencyCode
    );

    public function getCurrencyCode(): string;

    public function getCustomer(): CustomerInterface;

    public function getOrderNumber(): string;
}
