<?php

namespace App\Repository;

use App\Entity\Chausson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Chausson|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chausson|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chausson[]    findAll()
 * @method Chausson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChaussonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chausson::class);
    }

     /**
     * @return Chausson[] Returns an array of Chausson objects
     */
    
    public function findtopfivechausson()
    {
        return $this->createQueryBuilder('c')
        ->orderBy('c.nbr_vente')
        ->setMaxResults(5)
        ->getQuery()
        ->getResult();
        
    }

    public function findByMarque($id): ?Chausson
    {
        return $this->createQueryBuilder('c')
        ->andWhere('c.marque = :val')
        ->setParameter('val', $id)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Chausson
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
