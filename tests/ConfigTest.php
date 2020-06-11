<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests;

use Opdavies\Glassboxx\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testThatGettersReturnExpectedValues(): void
    {
        $config = new Config(
            12345,
            'opdavies',
            'secret'
        );

        $this->assertSame(12345, $config->getVendorId());
        $this->assertSame('opdavies', $config->getUsername());
        $this->assertSame('secret', $config->getPassword());
    }
}
