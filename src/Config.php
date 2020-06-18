<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx;

use Assert\Assert;

class Config
{
    /** @var int $vendorId */
    private $vendorId;

    /** @var string $username */
    private $username;

    /** @var string $password */
    private $password;

    public function __construct(
        int $vendorId,
        string $username,
        string $password
    ) {
        Assert::that($vendorId)
            ->greaterOrEqualThan(1, 'Vendor ID cannot be a negative number');

        Assert::that($username)->notEmpty('Username cannot be empty');
        Assert::that($password)->notEmpty('Password cannot be empty');

        $this->password = $password;
        $this->username = $username;
        $this->vendorId = $vendorId;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getVendorId(): int
    {
        return $this->vendorId;
    }
}
