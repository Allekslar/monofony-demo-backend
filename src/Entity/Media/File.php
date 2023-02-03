<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Entity\Media;

use Allekslar\MonofonyDemoBackendBundle\Entity\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;
use Monofony\Contracts\Core\Model\Media\FileInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\MappedSuperclass
 */
abstract class File implements FileInterface, ResourceInterface
{
    use IdentifiableTrait;

    protected ?\SplFileInfo $file = null;

    #[ORM\Column(type: 'string')]
    #[Groups(groups: ['file:read'])]
    protected ?string $path = null;

    #[ORM\Column(type: 'datetime')]
    protected \DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?\DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getFile(): ?\SplFileInfo
    {
        return $this->file;
    }

    public function setFile(?\SplFileInfo $file): void
    {
        $this->file = $file;
        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($file) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
