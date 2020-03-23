<?php

namespace App\Repository;

use App\Entity\Famille;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Famille|null find($id, $lockMode = null, $lockVersion = null)
 * @method Famille|null findOneBy(array $criteria, array $orderBy = null)
 * @method Famille[]    findAll()
 * @method Famille[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FamilleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Famille::class);
    }

    // /**
    //  * @return Famille[] Returns an array of Famille objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    
    public function findOneBySomeField($value): ?Famille
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    

    public function findAllVentes($id): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
         
        SELECT * FROM famille f
        INNER JOIN famille_type ft
        WHERE f.id = ft.famille_id
        AND ft.type_id = :id;
 
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        
  /*      
        $sql = '
            SELECT * FROM famille f
            WHERE f.label = :label 
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['label' => 'Appartement']);
    */
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();


       /* return $this->createQueryBuilder('f')
        ->where('f.label = :Maison')
        ->setParameter('Maison', 'Maison')
        ->getQuery()
        ->getResult();*/
    }

    /*public function findAllLocations()
    {
        return $this->createQueryBuilder('f')
        ->findOneBySomeField("label")
        ;
    }*/


}
