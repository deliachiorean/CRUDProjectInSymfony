<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 4:33 PM
 */

namespace App\Repository;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;

class TechnologyRepository
{
    /**
     * @var Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;

    }

    /**
     * @param $technologyName
     * @return bool
     * returns true if already exists and false if it's ok to insert
     */

    public function checkIfTechnologyAlreadyExists($technologyName)
    {
        $qb = $this->connection->createQueryBuilder();

        $result=$qb->select('name')
            ->from('technologies')
            ->where('name=:name')
            ->setParameter('name', $technologyName)
            ->execute()
            ->fetchAll();


        if ( count($result) >=1 ) {
            return true;
        } else {
            return false;
        }
    }




    /**
     * @param $tag
     * @return bool
     * returns true if tag exists and false if it is not ok to insert
     */
    public function checkIfTagExists($tag){
        $sql=$this->connection->createQueryBuilder();
        $result=$sql->select('name')
            ->from('tags')
            ->where('name=:name')
            ->setParameter('name',$tag)
            ->execute()
            ->fetchAll();

        if (count($result)>0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $tag
     * @return mixed
     * returns id for tag
     */

    public function GetIdForTag($tag){
        $sql=$this->connection->createQueryBuilder();
        $result=$sql->select('id')
            ->from('tags')
            ->where('name=:name')
            ->setParameter('name',$tag)
            ->execute()
            ->fetch(FetchMode::ASSOCIATIVE);

        return (int)$result["id"];

    }

    /**
     * @param $technologyName
     * @return mixed
     * return the id of a given technologyName
     */
    public function getTechnologyId($technologyName){
        $sql=$this->connection->createQueryBuilder();
        $result=$sql->select('id')
            ->from('technologies')
            ->where('name=:name')
            ->setParameter('name',$technologyName)
            ->execute()
            ->fetch(FetchMode::ASSOCIATIVE);

        return (int)$result["id"];


    }

    /**
     * @param $technologyName
     * @param $technologyPicture
     * @return bool
     */

    public function insertTechnology($technologyName,$technologyPicture){

        $sql=$this->connection->createQueryBuilder();
        $sql->insert('technologies')
            ->setValue('name',':name')
            ->setValue('picture',':picture')
            ->setParameter('name',$technologyName)
            ->setParameter('picture',$technologyPicture)
            ->execute();

        return true;


    }

    /**
     * @param int $idTechnology
     * @param int $idTag
     * @return bool
     */
    public function insertNewTechnologyTagRelation( int $idTechnology, int $idTag){

        $sql=$this->connection->createQueryBuilder();
        $sql->insert('technology_tags')
            ->setValue('technology_id',':technology_id')
            ->setValue('tag_id',':tag_id')
            ->setParameter('technology_id',$idTechnology)
            ->setParameter('tag_id',$idTag)
            ->execute();


        return true;


    }

}