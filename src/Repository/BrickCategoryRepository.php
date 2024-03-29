<?php

namespace App\Repository;

use App\Entity\BrickCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BrickCategory>
 *
 * @method BrickCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method BrickCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method BrickCategory[]    findAll()
 * @method BrickCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrickCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BrickCategory::class);
    }

    //    /**
    //     * @return BrickCategory[] Returns an array of BrickCategory objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BrickCategory
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
