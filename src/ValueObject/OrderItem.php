<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\ValueObject;

class OrderItem implements OrderItemInterface
{
    /** @var string */
    private $sku;

    /** @var float */
    private $price;

    public function __construct(float $price, string $sku)
    {
        $this->price = $price;
        $this->sku = $sku;
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
