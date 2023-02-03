<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Story;

use Allekslar\MonofonyDemoBackendBundle\Factory\LocaleFactory;
use Zenstruck\Foundry\Story;

final class DefaultLocalesStory extends Story
{
    public function build(): void
    {
        LocaleFactory::new()->withDefaultCode()->create();
    }
}
