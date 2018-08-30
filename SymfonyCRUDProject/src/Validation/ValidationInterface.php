<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 8/30/2018
 * Time: 2:34 PM
 */

namespace App\Validation;


use App\Entity\User;

interface ValidationInterface
{
    public function isValid(User $user);


}