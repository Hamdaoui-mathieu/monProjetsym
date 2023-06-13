<?php

namespace App\Repository;

use App\Entity\Detail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Mapping\OrderBy;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Detail>
 *
 * @method Detail|null find($id, $lockMode = null, $lockVersion = null)
 * @method Detail|null findOneBy(array $criteria, array $orderBy = null)
 * @method Detail[]    findAll()
 * @method Detail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Detail::class);
    }

    public function save(Detail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Detail $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Detail[] Returns an array of Detail objects
    */
   public function findCategoriesPopulaires(): array
   {
       return $this->createQueryBuilder('d')
           ->select('count(cmmd.id), cat.libelle')
           ->join('d.commande', 'cmmd')
           ->join('d.plat', 'p')
           ->join('p.categorie', 'cat')
           ->orderBy('count(cmmd.id)', 'desc')
           ->setMaxResults(6)
           ->getQuery()
           ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?Detail
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
