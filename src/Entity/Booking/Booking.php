<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Entity\Booking;

use Allekslar\MonofonyDemoBackendBundle\BookingStates;
use Allekslar\MonofonyDemoBackendBundle\Entity\Animal\Pet;
// use Allekslar\MonofonyDemoBackendBundle\Entity\Customer\Customer;
use Allekslar\MonofonyDemoBackendBundle\Entity\IdentifiableTrait;
// use Allekslar\MonofonyDemoBackendBundle\Entity\Customer\CustomerInterface;
use Allekslar\MonofonyDemoBackendBundle\Repository\BookingRepository;
use App\Entity\Customer\Customer;
use Doctrine\ORM\Mapping as ORM;
use Monofony\Contracts\Core\Model\Customer\CustomerInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
class Booking implements ResourceInterface
{
    use IdentifiableTrait;

    #[ORM\Column(type: 'datetime_immutable')]
    private \DateTimeImmutable $createdAt;

    #[ORM\ManyToOne(targetEntity: Pet::class)]
    private ?Pet $pet = null;

    #[ORM\ManyToOne(targetEntity: Customer::class)]
    private ?CustomerInterface $booker = null;

    #[ORM\Column(type: 'string')]
    private string $status;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->status = BookingStates::NEW;
    }

    public static function createForPetAndBooker(Pet $pet, CustomerInterface $booker): self
    {
        $booking = new self();
        $booking->setPet($pet);
        $booking->setBooker($booker);

        return $booking;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getPet(): ?Pet
    {
        return $this->pet;
    }

    public function setPet(?Pet $pet): void
    {
        $this->pet = $pet;
    }

    public function getBooker(): ?CustomerInterface
    {
        return $this->booker;
    }

    public function setBooker(?CustomerInterface $booker): void
    {
        $this->booker = $booker;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
