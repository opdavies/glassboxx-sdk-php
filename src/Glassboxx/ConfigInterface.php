<?php

namespace Opdavies\Glassboxx;

interface ConfigInterface
{
    public function __construct(
        int $vendorId,
        string $username,
        string $password
    );

    public function getPassword(): string;

    public function getUsername(): string;

    public function getVendorId(): int;
}
