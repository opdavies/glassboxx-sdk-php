<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Traits;

use DateTime;

trait UsesCreatedAtTrait
{
    /** @var string */
    private $time = 'now';

    public function getCreatedAtDate(): string
    {
        return (new DateTime($this->time))->format('Y-m-d H:i:s');
    }

    public function setCreatedDate(string $dateString): self
    {
        $this->time = $dateString;

        return $this;
    }
}
