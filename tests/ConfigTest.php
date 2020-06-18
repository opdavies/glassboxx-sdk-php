<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Tests;

use Assert\AssertionFailedException;
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

    public function badCreateDataProvider(): array
    {
        return [
            'Negative vendor ID' => [
                'vendor id' => -1,
                'username' => 'user',
                'password' => 'secret',
                'message' => 'Vendor ID cannot be a negative number',
            ],
            'Username is an empty string' => [
                'vendor id' => 123,
                'username' => '',
                'password' => 'secret',
                'message' => 'Username cannot be empty',
            ],
            'Password is an empty string' => [
                'vendor id' => 123,
                'username' => 'user',
                'password' => '',
                'message' => 'Password cannot be empty',
            ],
        ];
    }

    /**
     * @dataProvider badCreateDataProvider
     *
     * @param int $vendorId
     * @param string $username
     * @param string $password
     * @param string $message
     */
    public function testThatAnExceptionIsThrownWhenBadData(
        int $vendorId,
        string $username,
        string $password,
        string $message
    ) {
        $this->expectException(AssertionFailedException::class);
        $this->expectExceptionMessage($message);

        new Config($vendorId, $username, $password);
    }

}
