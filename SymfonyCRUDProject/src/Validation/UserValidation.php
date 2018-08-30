<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 8/30/2018
 * Time: 12:56 PM
 */

namespace App\Validation;

use App\Entity\User;
use App\Validation\Validator\ValidatorInterface;


class UserValidation implements ValidationInterface
{
//    private $isValid=false;
//    public function isValid($val='B'){
//        if($val='A')
//            $this->isValid=True;
//        return $this->isValid;
//    }

//    public static function isValid($val = 'B'){
//        return ($val == 'A') ? true : false ;
//    }
    /**
     * @var ValidatorInterface
     */
    private $userValidator;
    public function __construct(ValidatorInterface $userValidator)
    {
        $this->userValidator=$userValidator;
    }

    public function isValid(User $user ){

        $errors=$this->userValidator->validate($user);
        return (count($errors)>0) ? false : true;
    }
}