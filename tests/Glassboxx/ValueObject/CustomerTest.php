<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests\Glassboxx\ValueObject;

use Opdavies\Glassboxx\Tests\Glassboxx\TestCase;
use Opdavies\Glassboxx\ValueObject\Customer;

final class CustomerTest extends TestCase
{
    public function testCreatingACustomer(): void
    {
        $customer = new Customer(
            'Oliver',
            'Davies',
            'oliver@oliverdavies.uk'
        );

        $this->assertSame('Oliver', $customer->getFirstName());
        $this->assertSame('Davies', $customer->getLastName());
        $this->assertSame('oliver@oliverdavies.uk', $customer->getEmailAddress());
    }
}
