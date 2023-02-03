<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Modifier;

use Allekslar\MonofonyDemoBackendBundle\Entity\Animal\Pet;

interface PetModifierInterface
{
    public function createBooking(Pet $pet): void;

    public function enablePet(Pet $pet): void;

    public function disablePet(Pet $pet): void;
}
