<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/10/2018
 * Time: 5:32 PM
 */

namespace App\Tests;



use App\Entity\Technology;
use PHPUnit\Framework\TestCase;

class TestTechnology extends TestCase
{
    public function testGetName(){
        $technology= new Technology("Symfony","picture");
        $this->assertEquals($technology->getName(),'Symfony');
    }

}