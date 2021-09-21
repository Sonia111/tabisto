<?php

namespace App\Repository;

use App\Entity\CoreEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoreEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoreEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoreEntity[]    findAll()
 * @method CoreEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoreEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoreEntity::class);
    }

    // /**
    //  * @return CoreEntity[] Returns an array of CoreEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoreEntity
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
