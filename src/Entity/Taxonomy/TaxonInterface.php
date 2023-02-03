<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Entity\Taxonomy;

use Sylius\Component\Taxonomy\Model\TaxonInterface as BaseTaxonInterface;

interface TaxonInterface extends BaseTaxonInterface
{
    public function getSizeRange(): ?string;

    public function setSizeRange(?string $sizeRange): void;
}
