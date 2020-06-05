<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

interface AuthTokenRequestInterface
{
    public const ENDPOINT = '/rest/V1/integration/admin/token';

    public function getToken(): string;
}
