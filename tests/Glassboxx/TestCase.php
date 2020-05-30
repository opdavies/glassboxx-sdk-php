<?php

namespace Opdavies\Glassboxx\Tests\Glassboxx;

use Opdavies\Glassboxx\Config;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Config */
    protected $config;

    protected function setUp(): void
    {
        parent::setUp();

        $this->config = $this->getMockBuilder(Config::class)
            ->onlyMethods([])
            ->setConstructorArgs(
                [
                    'vendor_id' => 123,
                    'username' => 'opdavies',
                    'password' => 'secret',
                ]
            )
            ->getMock();
    }
}
