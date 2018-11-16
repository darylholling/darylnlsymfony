<?php

namespace App\Repository;

use App\Entity\Projecten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Projecten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Projecten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Projecten[]    findAll()
 * @method Projecten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Projecten::class);
    }

    // /**
    //  * @return Projecten[] Returns an array of Projecten objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Projecten
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
