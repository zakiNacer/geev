<?php

namespace App\Repository;

use App\Entity\ProduitGestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitGestion>
 *
 * @method ProduitGestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitGestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitGestion[]    findAll()
 * @method ProduitGestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitGestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitGestion::class);
    }

    public function save(ProduitGestion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProduitGestion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ProduitGestion[] Returns an array of ProduitGestion objects
//     */
//    public function findByParticipation($participation): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.participation = :val')
//            ->setParameter('val', $participation)
//            ->orderBy('p.id', 'ASC')
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProduitGestion
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
