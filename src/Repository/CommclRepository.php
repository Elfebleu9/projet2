<?php

namespace App\Repository;

use App\Entity\Commcl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Commcl|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commcl|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commcl[]    findAll()
 * @method Commcl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommclRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Commcl::class);
    }

    // /**
    //  * @return Commentaire[] Returns an array of Commentaire objects
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
    public function findOneBySomeField($value): ?Commentaire
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