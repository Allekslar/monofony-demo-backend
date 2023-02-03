<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class UndecorateLocalePass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $contextLocaleCompositeDefinition = $container->getDefinition('sylius.context.locale.composite');
        $contextLocaleCompositeDefinition->setDecoratedService(null);
    }
}
