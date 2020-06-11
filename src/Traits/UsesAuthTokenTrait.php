<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Traits;

trait UsesAuthTokenTrait
{
    /** @var string|null */
    protected $authToken;

    public function withAuthToken(string $authToken): self
    {
        $this->authToken = $authToken;

        return $this;
    }
}
