<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Entity\Animal;

use Allekslar\MonofonyDemoBackendBundle\Entity\Media\File;
use ApiPlatform\Action\NotFoundAction;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints\File as FileValidator;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[Vich\Uploadable]
#[Entity]
#[Table]
#[ApiResource]
#[Get(controller: NotFoundAction::class, read: false)]
#[GetCollection]
class PetImage extends File
{
    #[Vich\UploadableField(mapping: 'animal_image', fileNameProperty: 'path')]
    #[FileValidator(maxSize: '6000000', mimeTypes: ['image/*'])]
    protected ?\SplFileInfo $file = null;

    #[ManyToOne(targetEntity: Pet::class, inversedBy: 'images')]
    private ?Pet $pet = null;

    public function getPet(): ?Pet
    {
        return $this->pet;
    }

    public function setPet(?Pet $pet): void
    {
        $this->pet = $pet;
    }
}
