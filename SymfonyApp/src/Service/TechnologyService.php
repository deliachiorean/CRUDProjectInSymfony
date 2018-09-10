<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 12:52 PM
 */

namespace App\Service;



use App\Entity\Technology;

use App\Exceptions\EmptyTechnologyException;
use App\Exceptions\TechnologyExistsException;
use App\Exceptions\UnknownTagException;
use App\Repository\TechnologyRepository;
use App\Validator\TagConstraint;

use Symfony\Component\Validator\ConstraintViolationInterface;

use Symfony\Component\Validator\Validator\ValidatorInterface;

class TechnologyService
{
    private $technologyRepository;
    private $validator;

    public function __construct(TechnologyRepository $technologyRepository, ValidatorInterface $validator)
    {
        $this->technologyRepository=$technologyRepository;
        $this->validator=$validator;
    }

    /**
     * @param Technology $technology
     * @return string[]|null
     */
    private function checkIfEmpty(Technology $technology){
        $errors=$this->validator->validate($technology);

        $errorMessages = [];

        /** @var $error ConstraintViolationInterface */
        foreach ($errors as $error) {
            $errorMessages[] = $error->getMessage();
        }

        return $errorMessages;
    }

    /**
     * @param Technology $technology
     * @return bool

     */
    private function checkTechnologyName(Technology $technology){
        if($this->technologyRepository->checkIfTechnologyAlreadyExists($technology->getName())===True){
           return false;
        }
        return true;
    }


    private function addTechnology(Technology $technology){
       return $this->technologyRepository->insertTechnology($technology->getName(), $technology->getPicture());

    }
    public function getIdForTechnology($techName){
        return $this->technologyRepository->getTechnologyId($techName);
    }


    private function getTagId(  $tag){
        return $this->technologyRepository->GetIdForTag($tag);
    }
    private function addTechnologyTagRelation($tech_id,$Tag_id){
        return $this->technologyRepository->insertNewTechnologyTagRelation($tech_id,$Tag_id);
    }


    /**
     * @param Technology $technology
     * @param $assocTag
     * @throws EmptyTechnologyException
     * @throws TechnologyExistsException
     * @throws UnknownTagException
     */
    public function add(Technology $technology,$assocTag){

        $errorMessages = $this->checkIfEmpty($technology);
        if (sizeof($errorMessages) > 0) {
            throw new EmptyTechnologyException(implode('. ', $errorMessages));
        }
        if ($this->checkTechnologyName($technology) === false) {
            throw new TechnologyExistsException();
        }
        $tagConstraint = new TagConstraint();
        $errors = $this->validator->validate($assocTag, $tagConstraint);

        if (count($errors) > 0) {
            throw new UnknownTagException();
        }

        $this->addTechnology($technology);

        $tag_id =$this->getTagId($assocTag);
        $techName=$technology->getName();
        $tech_id=$this->getIdForTechnology($techName);
        $this->addTechnologyTagRelation($tech_id,$tag_id);

    }

}