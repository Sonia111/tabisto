<?php

namespace App\Repository;

use App\Entity\TypeTile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeTile|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeTile|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeTile[]    findAll()
 * @method TypeTile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeTileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeTile::class);
    }

    // /**
    //  * @return TypeTile[] Returns an array of TypeTile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeTile
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
