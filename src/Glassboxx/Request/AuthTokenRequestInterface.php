<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

interface AuthTokenRequestInterface
{
    public const ENDPOINT = '/integration/admin/token';

    public function getToken(): string;
}
