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

    /**
     * TechnologyService constructor.
     * @param TechnologyRepository $technologyRepository
     * @param ValidatorInterface $validator
     */
    public function __construct(TechnologyRepository $technologyRepository, ValidatorInterface $validator)
    {
        $this->technologyRepository=$technologyRepository;
        $this->validator=$validator;
    }

    /**
     * @param Technology $technology
     * @return string[]|null
     */
    protected function getValidationErrors(Technology $technology){
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
    public function checkTechnologyName(Technology $technology){
       return !$this->technologyRepository->checkIfTechnologyAlreadyExists($technology->getName());
    }

    /**
     * @param Technology $technology
     * @return bool
     */
    public function addTechnology(Technology $technology){
       return $this->technologyRepository->insertTechnology($technology->getName(), $technology->getPicture());

    }

    /**
     * @param $techName
     * @return mixed
     */
    public function getIdForTechnology($techName){
        return $this->technologyRepository->getTechnologyId($techName);
    }

    /**
     * @param $tag
     * @return mixed
     */
    public function getTagId(  $tag){
        return $this->technologyRepository->getIdForTag($tag);
    }

    /**
     * @param $tech_id
     * @param $Tag_id
     * @return bool
     */
    public function addTechnologyTagRelation($tech_id,$Tag_id){
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

        $errorMessages = $this->getValidationErrors($technology);
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



    //////////////////////////////////////////////
    //////////////////////////////////////////////
    ////////////////if enough time////////////////
    //////////////////////////////////////////////
    //////////////////////////////////////////////

    /**
     * @param $username
     * @return bool
     */
    public function checkIfUsernameExits($username){


        return $this->technologyRepository->checkIfUsernameExistsInDatabase($username);
    }


    /**
     * @param $id
     * @return bool
     */

    public function checkIfTechnologyIsInTechnologyValidators($id){

        return $this->technologyRepository->checkIfTechnologyIdExistsInTechnologyValidators($id);

    }



}