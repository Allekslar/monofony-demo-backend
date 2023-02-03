<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle;

use Allekslar\MonofonyDemoBackendBundle\DependencyInjection\Compiler\UndecorateLocalePass;
use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MonofonyDemoBackendBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new UndecorateLocalePass());

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';

        if (class_exists($ormCompilerClass)) {
            $namespaces = ['MonofonyDemoBackendBundle\Entity'];
            $directories = [realpath(__DIR__ . '/Entity')];
            $managerParameters = [];
            $enabledParameter = false;
            $aliasMap = [
                'MonofonyDemoBackendBundle' => 'MonofonyDemoBackendBundle\Entity',
            ];
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createAnnotationMappingDriver(
                    $namespaces,
                    $directories,
                    $managerParameters,
                    $enabledParameter,
                    $aliasMap
                )
            );
        }
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
