<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\ValueObject;

final class Customer implements CustomerInterface
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $emailAddress;

    public function __construct(
        string $firstName,
        string $lastName,
        string $emailAddress
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->emailAddress = $emailAddress;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmailAddress(): string
    {
        return $this->emailAddress;
    }
}
