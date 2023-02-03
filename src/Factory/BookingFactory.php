<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Factory;

use Allekslar\MonofonyDemoBackendBundle\BookingStates;
use Allekslar\MonofonyDemoBackendBundle\Entity\Booking\Booking;
use Allekslar\MonofonyDemoBackendBundle\PetStates;
use Allekslar\MonofonyDemoBackendBundle\Repository\BookingRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Booking>
 *
 * @method static Booking|Proxy createOne(array $attributes = [])
 * @method static Booking[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Booking|Proxy find(object|array|mixed $criteria)
 * @method static Booking|Proxy findOrCreate(array $attributes)
 * @method static Booking|Proxy first(string $sortedField = 'id')
 * @method static Booking|Proxy last(string $sortedField = 'id')
 * @method static Booking|Proxy random(array $attributes = [])
 * @method static Booking|Proxy randomOrCreate(array $attributes = [])
 * @method static Booking[]|Proxy[] all()
 * @method static Booking[]|Proxy[] findBy(array $attributes)
 * @method static Booking[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Booking[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static BookingRepository|RepositoryProxy repository()
 * @method Booking|Proxy create(array|callable $attributes = [])
 */
final class BookingFactory extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->datetime()),
            'pet' => PetFactory::randomOrCreate(),
            'booker' => \App\Factory\AppUserFactory::randomOrCreate()->getCustomer(),
            'status' => self::faker()->randomElement(BookingStates::ALL),
        ];
    }

    protected function initialize(): self
    {
        return $this
            ->afterInstantiate(function (Booking $booking, array $attributes): void {
                if (
                    BookingStates::FINISHED !== $booking->getStatus()
                    && BookingStates::CANCELED !== $booking->getStatus()
                    && BookingStates::REFUSED !== $booking->getStatus()
                ) {
                    $booking->getPet()->setStatus(PetStates::BOOKED);
                }
            });
    }

    protected static function getClass(): string
    {
        return Booking::class;
    }
}
