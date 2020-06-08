<?php

namespace Opdavies\Glassboxx\ValueObject;

interface OrderItemInterface
{
    public function getPrice(): float;

    public function getSku(): string;
}
