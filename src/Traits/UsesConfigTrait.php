<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Traits;

use Opdavies\Glassboxx\Config;

trait UsesConfigTrait
{
    /** @var Config|null */
    protected $config;

    public function withConfig(Config $config): self
    {
        $this->config = $config;

        return $this;
    }
}
