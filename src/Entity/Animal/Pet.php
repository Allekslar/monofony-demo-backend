<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Entity\Animal;

use Allekslar\MonofonyDemoBackendBundle\Entity\IdentifiableTrait;
use Allekslar\MonofonyDemoBackendBundle\Entity\Taxonomy\Taxon;
use Allekslar\MonofonyDemoBackendBundle\Entity\Taxonomy\TaxonInterface;
use Allekslar\MonofonyDemoBackendBundle\PetStates;
use Allekslar\MonofonyDemoBackendBundle\Repository\PetRepository;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Link;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;

#[ORM\Entity(repositoryClass: PetRepository::class)]
#[ApiResource(normalizationContext: [
    'groups' => ['pet:read', 'file:read'],
])]
#[Get]
#[GetCollection]
#[GetCollection(uriTemplate: '/taxa/{code}/pets', uriVariables: [
    'code' => new Link(toProperty: 'taxon', fromClass: Taxon::class),
])]
class Pet implements ResourceInterface
{
    use IdentifiableTrait;

    #[ORM\Column(type: 'integer')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ApiProperty(identifier: false)]
    protected ?int $id = null;

    #[ORM\Column(type: 'string')]
    #[NotBlank]
    #[Groups(groups: ['pet:read'])]
    private ?string $name = null;

    #[ORM\Column(type: 'string', unique: true)]
    #[Gedmo\Slug(fields: ['name'])]
    #[ApiProperty(identifier: true)]
    private ?string $slug = null;

    #[ORM\Column(type: 'string')]
    private string $status;

    #[ORM\Column(type: 'boolean')]
    private bool $enabled = false;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Groups(groups: ['pet:read'])]
    private ?string $description = null;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Groups(groups: ['pet:read'])]
    private ?float $size = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['pet:read'])]
    private ?string $sizeUnit = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['pet:read'])]
    private ?string $mainColor = null;

    #[ORM\Column(type: 'string', nullable: true)]
    #[Groups(groups: ['pet:read'])]
    private ?string $sex = null;

    #[ORM\ManyToOne(targetEntity: Taxon::class)]
    #[NotBlank]
    #[Groups(groups: ['pet:read'])]
    private ?TaxonInterface $taxon = null;

    #[ORM\OneToMany(
        mappedBy: 'pet',
        targetEntity: PetImage::class,
        cascade: ['persist'],
        orphanRemoval: true,
    )]
    #[Valid]
    #[Groups(groups: ['pet:read'])]
    private Collection $images;

    public function __construct()
    {
        $this->status = PetStates::NEW;
        $this->images = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(?float $size): void
    {
        $this->size = $size;
    }

    public function getSizeUnit(): ?string
    {
        return $this->sizeUnit;
    }

    public function setSizeUnit(?string $sizeUnit): void
    {
        $this->sizeUnit = $sizeUnit;
    }

    public function getMainColor(): ?string
    {
        return $this->mainColor;
    }

    public function setMainColor(?string $mainColor): void
    {
        $this->mainColor = $mainColor;
    }

    public function getTaxon(): ?TaxonInterface
    {
        return $this->taxon;
    }

    public function setTaxon(?TaxonInterface $taxon): void
    {
        $this->taxon = $taxon;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): void
    {
        $this->sex = $sex;
    }

    public function getImages(): ?Collection
    {
        return $this->images;
    }

    public function getFirstImage(): ?PetImage
    {
        return false !== $this->getImages()->first() ? $this->getImages()->first() : null;
    }

    public function hasImage(PetImage $image): bool
    {
        return $this->images->contains($image);
    }

    public function addImage(PetImage $image): void
    {
        if (! $this->hasImage($image)) {
            $this->images->add($image);
            $image->setPet($this);
        }
    }

    public function removeImage(PetImage $image): void
    {
        $this->images->removeElement($image);
        $image->setPet(null);
    }
}
