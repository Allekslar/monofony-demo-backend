<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MonofonyDemoBackendExtension extends Extension implements PrependExtensionInterface
{
    public function prepend(ContainerBuilder $containerBuilder)
    {
        $loaderYaml = new YamlFileLoader($containerBuilder, new FileLocator(\dirname(__DIR__, 2) . '/config'));
        $loaderYaml->load('services.yaml');
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $loaderXml = new XmlFileLoader($container, new FileLocator(\dirname(__DIR__, 2) . '/config'));
        $loaderXml->load('services.xml');
    }
}
