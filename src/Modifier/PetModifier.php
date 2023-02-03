<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Modifier;

use Allekslar\MonofonyDemoBackendBundle\Entity\Animal\Pet;
use Allekslar\MonofonyDemoBackendBundle\Entity\Booking\Booking;
use Allekslar\MonofonyDemoBackendBundle\Entity\Customer\CustomerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Customer\Context\CustomerContextInterface;

final class PetModifier implements PetModifierInterface
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CustomerContextInterface $customerContext,
    ) {
    }

    public function createBooking(Pet $pet): void
    {
        /** @var CustomerInterface $booker */
        $booker = $this->customerContext->getCustomer();
        $booking = Booking::createForPetAndBooker($pet, $booker);

        $this->entityManager->persist($booking);
        $this->entityManager->flush();
    }

    public function enablePet(Pet $pet): void
    {
        $pet->setEnabled(true);
    }

    public function disablePet(Pet $pet): void
    {
        $pet->setEnabled(false);
    }
}
