<?php

namespace App\Repository;

use App\Entity\Gedcom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gedcom>
 *
 * @method Gedcom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gedcom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gedcom[]    findAll()
 * @method Gedcom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GedcomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gedcom::class);
    }

    public function update(Gedcom $gedcom, bool $flush = false): void
    {
        $this->getEntityManager()->persist($gedcom);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    
    public function remove(Gedcom $gedcom, bool $flush = false): void
    {
        $this->getEntityManager()->remove($gedcom);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Gedcom[] Returns an array of Gedcom objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Gedcom
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
