<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\ValueObject;

use Opdavies\Glassboxx\Tests\TestCase;
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
            '123',
            'GBP'
        );

        $this->assertSame('GBP', $order->getCurrencyCode());
        $this->assertSame($customer, $order->getCustomer());
        $this->assertSame('123', $order->getOrderNumber());
    }
}
