<?php

namespace App\Repository;

use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employee>
 *
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    /**
     * @return Employee[] Retourne un tableau d'objets Employee
     */
    public function findByNameOrEmail(string $searchTerm): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.name LIKE :val OR e.email LIKE :val')
            ->setParameter('val', '%' . $searchTerm . '%')
            ->orderBy('e.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Employee[] Retourne un tableau d'objets Employee/restaurant
     */
    public function findByRestaurant(int $restaurantId): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.restaurant = :restaurantId')
            ->setParameter('restaurantId', $restaurantId)
            ->orderBy('e.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function save(Employee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Employee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}