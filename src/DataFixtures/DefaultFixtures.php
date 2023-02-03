<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\DataFixtures;

use Allekslar\MonofonyDemoBackendBundle\Story\DefaultLocalesStory;
use Allekslar\MonofonyDemoBackendBundle\Story\DefaultTaxonomyStory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class DefaultFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        DefaultLocalesStory::load();
        DefaultTaxonomyStory::load();
    }

    public static function getGroups(): array
    {
        return ['default'];
    }
}
