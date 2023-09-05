<?php

namespace App\Repository;

use App\Entity\IdMembre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IdMembre>
 *
 * @method IdMembre|null find($id, $lockMode = null, $lockVersion = null)
 * @method IdMembre|null findOneBy(array $criteria, array $orderBy = null)
 * @method IdMembre[]    findAll()
 * @method IdMembre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdMembreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IdMembre::class);
    }

//    /**
//     * @return IdMembre[] Returns an array of IdMembre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IdMembre
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
