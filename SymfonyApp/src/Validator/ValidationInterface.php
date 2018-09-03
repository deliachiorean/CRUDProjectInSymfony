<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 2:48 PM
 */

namespace App\Validator;


use App\Entity\Technology;

interface ValidationInterface
{
    public function  validate( Technology $technology);

}