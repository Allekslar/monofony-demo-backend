<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Story;

use Allekslar\MonofonyDemoBackendBundle\Colors;
use Allekslar\MonofonyDemoBackendBundle\Factory\PetFactory;
use Allekslar\MonofonyDemoBackendBundle\Factory\TaxonFactory;
use Zenstruck\Foundry\Story;

final class TestPetsStory extends Story
{
    public function build(): void
    {
        TaxonFactory::new()
            ->withCode('bears')
            ->withName('Bears')
            ->create()
        ;

        TaxonFactory::new()
            ->withCode('cats')
            ->withName('Cats')
            ->create()
        ;

        PetFactory::new()
            ->withName('Winnie')
            ->withTaxon('bears')
            ->withMainColor(Colors::ORANGE)
            ->create()
        ;

        PetFactory::new()
            ->withName('Willy')
            ->withTaxon('cats')
            ->withMainColor(Colors::BLACK)
            ->create()
        ;

        PetFactory::new()
            ->withMainColor(Colors::WHITE)
            ->withTaxon('bears')
            ->many(2)
            ->create()
        ;
    }
}
