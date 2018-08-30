<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 8/30/2018
 * Time: 2:32 PM
 */

namespace App\Validation\Validator;


use App\Entity\User;

interface ValidatorInterface
{
    public function validate(User $user);
}