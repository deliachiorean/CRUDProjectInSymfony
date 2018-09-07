<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/6/2018
 * Time: 3:13 PM
 */

namespace App\Validator;


use App\Repository\TechnologyRepository;




class TagValidator
{

    private $technologyRepository;

    public function __construct(TechnologyRepository $technologyRepository)
    {
        $this->technologyRepository = $technologyRepository;
    }

    /**
     * @param $value
     * @return bool
     */
    public function validate($value)
    {
        if($this->technologyRepository->checkIfTagExists($value)===true){
            return true;
        }
        return false;

    }

}