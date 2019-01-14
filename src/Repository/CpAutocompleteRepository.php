<?php

namespace App\Repository;

use App\Entity\CpAutocomplete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CpAutocomplete|null find($id, $lockMode = null, $lockVersion = null)
 * @method CpAutocomplete|null findOneBy(array $criteria, array $orderBy = null)
 * @method CpAutocomplete[]    findAll()
 * @method CpAutocomplete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CpAutocompleteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CpAutocomplete::class);
    }

//    /**
//     * @return CpAutocomplete[] Returns an array of CpAutocomplete objects
//     */
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
    public function findOneBySomeField($value): ?CpAutocomplete
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
