<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Story;

use Allekslar\MonofonyDemoBackendBundle\Factory\TaxonFactory;
use Zenstruck\Foundry\Story;

final class DefaultTaxonomyStory extends Story
{
    public function build(): void
    {
        TaxonFactory::new()

            ->withName('Cats')
            ->withDescription('We could talk about their behavior for hours.')
            ->withChildren([
                [
                    'name' => 'Persian',
                ],
                [
                    'name' => 'Siamese',
                ],
                [
                    'name' => 'Ragdoll',
                ],
            ])
            ->create();

        TaxonFactory::new()
            ->withName('Dogs')
            ->withDescription('They will bring you the ball back. Eventually.')
            ->withChildren([
                [
                    'name' => 'Labrador',
                ],
                [
                    'name' => 'Poodle',
                ],
                [
                    'name' => 'Husky',
                ],
            ])
            ->create();

        TaxonFactory::new()
            ->withName('Small pets')
            ->withDescription('« Theyre so fluffy Im gonna die!»')
            ->withChildren([
                [
                    'name' => 'Hamster',
                ],
                [
                    'name' => 'Rabbit',
                ],
            ])
            ->create();
    }
}
