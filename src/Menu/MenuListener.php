<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class MenuListener
{
    public const EVENT_NAME = 'sylius.menu.admin.main';

    public function __construct(
        private FactoryInterface $factory,
        private EventDispatcherInterface $eventDispatcher,
    ) {
    }

    public function addNewMenu(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $this->addPetSubMenu($menu);
        $this->addBookingSubMenu($menu);
    }

    private function addPetSubMenu(ItemInterface $menu): void
    {
        $pet = $menu
            ->addChild('pet')
            ->setLabel('app.ui.pet')
        ;

        $pet->addChild('backend_pet', [
            'route' => 'monofony_demo_backend_pet_index',
        ])
            ->setLabel('app.ui.pets')
            ->setLabelAttribute('icon', 'cat');

        $pet->addChild('backend_taxon', [
            'route' => 'sylius_backend_taxon_create',
        ])
            ->setLabel('sylius.ui.taxons')
            ->setLabelAttribute('icon', 'fax');
    }

    private function addBookingSubMenu(ItemInterface $menu): void
    {
        $booking = $menu
            ->addChild('booking')
            ->setLabel('app.ui.booking')
        ;

        $booking->addChild('backend_booking', [
            'route' => 'monofony_demo_backend_booking_index',
        ])
            ->setLabel('app.ui.bookings')
            ->setLabelAttribute('icon', 'fax');
    }
}
