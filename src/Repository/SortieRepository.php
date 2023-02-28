<?php

namespace App\Repository;

use App\Entity\Participant;
use App\Entity\Sortie;
use App\Service\SearchData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sortie>
 *
 * @method Sortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sortie[]    findAll()
 * @method Sortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sortie::class);
    }

    public function save(Sortie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sortie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByFilter(SearchData $search, Participant $user): array
    {
        $query = $this->createQueryBuilder('s');


        if ($search->campus) {
            $query = $query->andWhere('s.campus = :campus')
                ->setParameter('campus', $search->campus);
        }

        if (!empty($search->nom)) {
            $query = $query->andWhere('s.nom LIKE :nom')
                ->setParameter('nom', "%{$search->nom}%");
        }

        if (!empty($search->dateDebutRecherche) && ($search->dateFinRecherche)) {
            $query = $query->andWhere('s.dateHeureDebut BETWEEN :dateDebutRecherche AND :dateFinRecherche')
                ->setParameter('dateDebutRecherche',  $search->dateDebutRecherche)
                ->setParameter('dateFinRecherche',  $search->dateFinRecherche);
        }

        if($search->option1){
            $query = $query
                ->andWhere('s.organisateur = :organisateur')
                ->setParameter('organisateur', $user);
        }

        if($search->option2){
            $query = $query
                ->andWhere(':participant MEMBER OF s.participants')
                ->setParameter('participant', $user);
        }

        if($search->option3){
            $query = $query
                ->andWhere(':participant NOT MEMBER s.participants')
                ->setParameter('participant', $user);
        }

        return $query->getQuery()->getResult();
    }
}




//    /**
//     * @return Sortie[] Returns an array of Sortie objects
//     */
//

//    public function findOneBySomeField($value): ?Sortie
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

