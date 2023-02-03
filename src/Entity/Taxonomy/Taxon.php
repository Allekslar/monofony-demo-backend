<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Entity\Taxonomy;

use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Sylius\Component\Taxonomy\Model\Taxon as BaseTaxon;

#[Entity]
#[Table(name: 'sylius_taxon')]
#[ApiResource(normalizationContext: [
    'groups' => ['taxon:read'],
])]
#[Get(controller: NotFoundAction::class, read: false)]
#[GetCollection]
class Taxon extends BaseTaxon implements TaxonInterface
{
    // #[ORM\Column(type: 'integer')]
    // #[ORM\Id]
    // #[ORM\GeneratedValue(strategy: 'AUTO')]
    // #[ApiProperty(identifier: false)]
    // protected $id;

    #[ApiProperty(identifier: true)]
    protected $code;

    #[Column(type: 'string', nullable: true)]
    private ?string $sizeRange = null;

    public function getSizeRange(): ?string
    {
        return $this->sizeRange;
    }

    public function setSizeRange(?string $sizeRange): void
    {
        $this->sizeRange = $sizeRange;
    }
}
