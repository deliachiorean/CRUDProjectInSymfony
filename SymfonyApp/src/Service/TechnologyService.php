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
use App\Validator\TagValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TechnologyService
{
    private $technologyRepository;
    private $validator;
    private $tagValidator;

    public function __construct(TechnologyRepository $technologyRepository, ValidatorInterface $validator, TagValidator $tagValidator )
    {
        $this->technologyRepository=$technologyRepository;
        $this->validator=$validator;
        $this->tagValidator=$tagValidator;
    }

    /**
     * @param Technology $technology
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface
     */
    private function checkIfEmpty(Technology $technology){
        $errors=$this->validator->validate($technology);

        return $errors;

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
    private function getIdForTechnology($techName){
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


        if (sizeof($this->checkIfEmpty($technology)) > 0)
            throw new EmptyTechnologyException($this->checkIfEmpty($technology));

        if ($this->checkTechnologyName($technology) === false)
           throw new TechnologyExistsException();

        if ($this->tagValidator->validate($assocTag) === false)
           throw new UnknownTagException();



           $this->addTechnology($technology);

           $tag_id =(int)$this->getTagId($assocTag);
           $techName=$technology->getName();
           $tech_id=(int)$this->getIdForTechnology($techName);
           $this->addTechnologyTagRelation($tech_id,$tag_id);

    }
}