<?php

namespace App\Repository;

use App\Entity\AboutMeData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AboutMeData>
 *
 * @method AboutMeData|null find($id, $lockMode = null, $lockVersion = null)
 * @method AboutMeData|null findOneBy(array $criteria, array $orderBy = null)
 * @method AboutMeData[]    findAll()
 * @method AboutMeData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AboutMeDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AboutMeData::class);
    }

//    /**
//     * @return AboutMeData[] Returns an array of AboutMeData objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AboutMeData
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
