<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\ValueObject;

interface CustomerInterface
{
    public function __construct(
        string $firstName,
        string $lastName,
        string $emailAddress
    );

    public function getEmailAddress(): string;

    public function getFirstName(): string;

    public function getLastName(): string;
}
