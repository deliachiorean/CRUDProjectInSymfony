<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 4:33 PM
 */

namespace App\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Entity\Technology;
use Doctrine\Common\Persistence\ManagerRegistry;



class TechnologyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Technology::class);
    }

    public function getNamesForTechnologies(){
        $entityManager=$this->getEntityManager();
        $query=$entityManager->createQuery('SELECT t.name FROM App\Entity\Technology t ');
        return $query->execute();
    }


}