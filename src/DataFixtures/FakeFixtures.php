<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\DataFixtures;

use Allekslar\MonofonyDemoBackendBundle\Story\RandomBookingsStory;
use Allekslar\MonofonyDemoBackendBundle\Story\RandomPetsStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class FakeFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        RandomPetsStory::load();
        RandomBookingsStory::load();
    }

    public static function getGroups(): array
    {
        return ['fake'];
    }
}
