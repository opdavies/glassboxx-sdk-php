<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\Glassboxx\ValueObject;

use Opdavies\Glassboxx\Tests\Glassboxx\TestCase;
use Opdavies\Glassboxx\ValueObject\Customer;
use Opdavies\Glassboxx\ValueObject\CustomerInterface;
use Opdavies\Glassboxx\ValueObject\Order;

class OrderTest extends TestCase
{
    public function testCreatingAnOrder(): void
    {
        $customer = $this->getMockBuilder(CustomerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $order = new Order(
            $customer,
            'this-is-the-sku',
            '123',
            'GBP',
            10.00
        );

        $this->assertSame('GBP', $order->getCurrencyCode());
        $this->assertSame($customer, $order->getCustomer());
        $this->assertSame('123', $order->getOrderNumber());
        $this->assertSame(10.0, $order->getPrice());
        $this->assertSame('this-is-the-sku', $order->getSku());
    }
}
