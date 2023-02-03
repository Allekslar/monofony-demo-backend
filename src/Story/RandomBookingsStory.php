<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Story;

use Allekslar\MonofonyDemoBackendBundle\Factory\BookingFactory;
use Zenstruck\Foundry\Story;

final class RandomBookingsStory extends Story
{
    public function build(): void
    {
        BookingFactory::createMany(15);
    }
}
