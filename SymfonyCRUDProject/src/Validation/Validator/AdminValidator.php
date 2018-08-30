<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 8/30/2018
 * Time: 2:27 PM
 */

namespace App\Validation\Validator;


use App\Entity\User;

class AdminValidator extends UserValidator
{


    public function  validate( User $user){

        $errors=parent::validate($user);
        if(strlen($user->getPassword())<5){
            $errors[]='Please have a stronger password';
        }

        return $errors;

    }
}