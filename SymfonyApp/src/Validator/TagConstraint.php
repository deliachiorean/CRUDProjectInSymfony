<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/10/2018
 * Time: 1:05 PM
 */

namespace App\Validator;


use Symfony\Component\Validator\Constraint;

class TagConstraint extends Constraint

{
    public $message='The tag "{{ tag }}" cannot be found in the database.';

}