<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/11/2018
 * Time: 12:23 PM
 */

namespace App\Tests\Entity;

use App\Entity\Technology;
use App\Repository\TechnologyRepository;
use PHPUnit\Framework\TestCase;

class TechnologyTest extends TestCase
{



    public function testGetName()
    {
        $tech= new Technology("TechnologyName","TechnologyPicture");
        $this->assertEquals("TechnologyName",$tech->getName());

    }


    public function testGetPicture()
    {
        $tech= new Technology("TechnologyName","TechnologyPicture");
        $this->assertEquals("TechnologyPicture",$tech->getPicture());

    }
}
