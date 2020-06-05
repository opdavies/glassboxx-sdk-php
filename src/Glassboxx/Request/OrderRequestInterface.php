<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\ValueObject\OrderInterface;

interface OrderRequestInterface
{
    public const ENDPOINT = '/rest/V1/glassboxxorder/toglassboxx';

    public function forOrder(OrderInterface $order): AbstractRequest;

    public function execute(): string;
}
