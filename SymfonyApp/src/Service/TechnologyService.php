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

    public function checkIfEmpty(Technology $technology){
        $errors=$this->validator->validate($technology);

        var_dump($errors);
        die();
        return count($errors);

    }

    /**
     * @param Technology $technology
     * @return bool
     * returns true if everything is ok and you can don the insert
     * returns false if name already in
     */
    public function checkTechnologyName(Technology $technology){
        if($this->technologyRepository->checkIfTechnologyAlreadyExists($technology->getName())===True){
           return false;
        }
        return true;
    }
    public function addTechnology(Technology $technology){
       return $this->technologyRepository->insertTechnology($technology->getName(), $technology->getPicture());

    }
    public function getIdForTechnology($techName){
        return $this->technologyRepository->getTechnologyId($techName);
    }

    /**
     * @param $tag
     * @return bool
     * returns tru if tag is in and you can insert
     * returns false if tagName doesn't exist
     */
//    public function checkTag( $tag){
//         return $this->technologyRepository->checkIfTagExists($tag);
//    }

    public function getTagId(  $tag){
        return $this->technologyRepository->GetIdForTag($tag);
    }
    public function addTechnologyTagRelation($tech_id,$Tag_id){
        return $this->technologyRepository->insertNewTechnologyTagRelation($tech_id,$Tag_id);
    }


    /**
     * @param Technology $technology
     * @param $assocTag
     * @return array
     */
    public function add(Technology $technology,$assocTag){
        $msg=[];

        try {
            if ($this->checkIfEmpty($technology) > 0)
                throw new EmptyTechnologyException();
        }catch (EmptyTechnologyException $e){
            array_push($msg,"errors");
        }

       try {
           if ($this->checkTechnologyName($technology) === false)
               throw new TechnologyExistsException();
       }catch (TechnologyExistsException $exc) {
           array_push($msg,"technologyName");
       }

       try{
           if ($this->tagValidator->validate($assocTag) === false) {
               throw new UnknownTagException();
           }
       }catch (UnknownTagException $exc2){
           array_push($msg,"tagName");
       }

//

       if(sizeof($msg)==0 ) {
           $a=$this->addTechnology($technology);


           $tag_id =(int)$this->getTagId($assocTag)["id"];
           $techName=$technology->getName();
           $tech_id=(int)$this->getIdForTechnology($techName)["id"];


           $b=$this->addTechnologyTagRelation($tech_id,$tag_id);


           if($a===True && $b===True)
                array_push($msg,"OK");

       }
       return $msg;

    }
}