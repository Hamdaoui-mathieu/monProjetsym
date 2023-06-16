<?php

namespace App\Repository;

use App\Entity\Plat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plat>
 *
 * @method Plat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plat[]    findAll()
 * @method Plat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plat::class);
    }

    public function save(Plat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Plat $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Plat[] Returns an array of Detail objects
    */
    public function findPlatPopulaires(): array
    {
        return $this->createQueryBuilder('d')
            // ->select('count(cmmd.id), cat.libelle')
            // ->join('d.commande', 'cmmd')
            // ->join('d.plat', 'p')
            // ->join('p.categorie', 'cat')
            // ->orderBy('count(cmmd.id)', 'desc')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findSearch($search): array
    {
        $libelle = '%'.$search.'%';
        $description = '%'.$search.'%';

        return $this->createBuilder('s')
            ->select('plat.id, plat.image, plat.libelle')
            ->andwhere('libelle = :libelle, description = :description')
            ->setParameter(':libelle', $libelle)
            ->setParameter(':description', $description)
            ->getQuery()
            ->getResult()
            ;

    }

    // public function findPlatCategorie():array
    // {
    //      return $this->createQueryBuilder('id')
    //          ->andWhere('id_categorie = :id_categorie')
    //         ->setParameter('id_categorie', $platcat)
    //          ->getQuery()
    //          ->getResult()
    //      ;
    //  }


//    public function findOneBySomeField($value): ?Plat
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
