<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Repository;

use Allekslar\MonofonyDemoBackendBundle\Entity\Animal\Pet;
use Allekslar\MonofonyDemoBackendBundle\Entity\Booking\Booking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Monofony\Contracts\Core\Model\Customer\CustomerInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\ResourceRepositoryTrait;
use Sylius\Component\Resource\Repository\RepositoryInterface;

/**
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[] findAll()
 * @method Booking[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository implements RepositoryInterface
{
    use ResourceRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

    public function createListForFrontQueryBuilder(CustomerInterface $booker): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->where('o.booker = :booker')
            ->setParameter('booker', $booker);
    }

    public function countBookings(): int
    {
        return (int) $this->createQueryBuilder('o')
            ->select('COUNT(o.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findLatest(int $count): array
    {
        return $this->createQueryBuilder('o')
            ->addOrderBy('o.createdAt', 'DESC')
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }

    public function findOneByCustomerAndPet(CustomerInterface $booker, Pet $pet): ?Booking
    {
        $queryBuilder = $this->createQueryBuilder('o')
            ->where('o.booker = :booker')
            ->andWhere('o.pet = :pet')
            ->addOrderBy('o.createdAt', 'DESC')
            ->setMaxResults(1)
            ->setParameter('booker', $booker)
            ->setParameter('pet', $pet)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }
}
