<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx;

final class Config implements ConfigInterface
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
