<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Story;

use Allekslar\MonofonyDemoBackendBundle\Factory\PetFactory;
use Zenstruck\Foundry\Story;

final class RandomPetsStory extends Story
{
    public function build(): void
    {
        PetFactory::createMany(100);
    }
}
