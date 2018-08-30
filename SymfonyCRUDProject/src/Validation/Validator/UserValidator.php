<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 8/30/2018
 * Time: 2:05 PM
 */

namespace App\Validation\Validator;




use App\Entity\User;

class UserValidator implements ValidatorInterface
{
    public function  validate(User $user){

        $errors=[];
        if(empty($user->getFirstName())){
            $errors[]='Please add a first name';
        }
        if(empty($user->getLastName())){
            $errors[]='Please add a last name';
        }

        return $errors;

    }

}