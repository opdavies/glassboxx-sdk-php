<?php

declare(strict_types=1);

namespace Opdavies\Glassboxx\Request;

use Opdavies\Glassboxx\ValueObject\CustomerInterface;

interface CustomerRequestInterface
{
    public const ENDPOINT = '/rest/V1/glassboxxorder/customCustomer';

    public function forCustomer(CustomerInterface $customer): AbstractRequest;

    public function execute(): string;
}
