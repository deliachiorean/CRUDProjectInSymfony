<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/11/2018
 * Time: 1:46 PM
 */

namespace App\Tests\Service;

use App\Entity\Tag;
use App\Entity\Technology;
use App\Repository\TechnologyRepository;
use App\Service\TechnologyService;
use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class TechnologyServiceTest extends TestCase
{

    /**
     * @var TechnologyRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    private $technologyRepository;
    /**
     * @var TechnologyService|\PHPUnit_Framework_MockObject_MockObject
     */
    private $technologyservice;

    /**
     * @var ValidatorInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $validator;

    /**
     * @var Connection|\PHPUnit_Framework_MockObject_MockObject
     */
    private $connectionMock;


    public function setUp(){
        $this->connectionMock=parent::getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->technologyservice=parent::getMockBuilder(TechnologyService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->validator = parent::getMockBuilder(ValidatorInterface::class)
            ->disableOriginalConstructor()
            ->getMock();


        $this->technologyRepository = new TechnologyRepository($this->connectionMock);
    }

    public function testAddTechnology()
    {


    }

    public function testAddTechnologyTagRelation()
    {

    }

    public function testAdd()
    {

    }

    public function testCheckTechnologyName()
    {

    }

    public function testGetIdForTechnology()
    {

        $tech=new Technology("techName","picture");
        $id=$tech->getId();

        $idFromDb=$this->technologyservice->getIdForTechnology($tech->getName());
        self::assertEquals($id,$idFromDb);

    }

    public function testGetTagId()
    {

        $tag=new Tag("tagName");
        $id=$tag->getId();

        $idFromDb=$this->technologyservice->getTagId($tag->getName());
        self::assertEquals($id,$idFromDb);

    }
}
