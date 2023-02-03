<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

final class PetFormBuilder
{
    public function __construct(
        private FactoryInterface $factory
    ) {
    }

    public function createMenu(array $options = []): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu
            ->addChild('details')
            ->setAttribute('template', '@MonofonyDemoBackend/backend/pet/tab/_details.html.twig')
            ->setLabel('sylius.ui.details')
            ->setCurrent(true)
        ;

        $menu
            ->addChild('taxonomy')
            ->setAttribute('template', '@MonofonyDemoBackend/backend/pet/tab/_taxonomy.html.twig')
            ->setLabel('sylius.ui.taxonomy')
        ;

        $menu
            ->addChild('media')
            ->setAttribute('template', '@MonofonyDemoBackend/backend/pet/tab/_media.html.twig')
            ->setLabel('sylius.ui.media')
        ;

        return $menu;
    }
}
