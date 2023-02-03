<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Provider;

use Monofony\Contracts\Core\Model\Customer\CustomerInterface;

interface CustomerProviderInterface
{
    public function provide(string $email): CustomerInterface;
}
