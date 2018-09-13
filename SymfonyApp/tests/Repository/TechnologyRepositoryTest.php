<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/11/2018
 * Time: 2:26 PM
 */

namespace App\Tests\Repository;

use App\Entity\Tag;
use App\Entity\Technology;
use App\Repository\TechnologyRepository;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Statement;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;

class TechnologyRepositoryTest extends TestCase
{
    /**
     * @var Connection|\PHPUnit_Framework_MockObject_MockObject
     */
    private $connectionMock;
    /**
     * @var QueryBuilder|\PHPUnit_Framework_MockObject_MockObject
     */
    private $queryBuilderMock;
    /**
     * @var Statement|\PHPUnit_Framework_MockObject_MockObject
     */
    private $statementMock;
    /**
     * @var TechnologyRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    private $technologyRepository;


    public function setUp(){
        $this->connectionMock=parent::getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->queryBuilderMock = parent::getMockBuilder(QueryBuilder::class)
                ->disableOriginalConstructor()
                ->getMock();

        $this->statementMock = parent::getMockBuilder(Statement::class)
                ->disableOriginalConstructor()
                ->getMock();

        $this->technologyRepository = new TechnologyRepository($this->connectionMock);
    }
    public function testCheckIfTagExists()
    {

        $tag="tagname";

        $this->connectionMock
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('select')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('from')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->once())
            ->method('where')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('setParameter')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('execute')
            ->willReturn($this->statementMock);

        $this->statementMock
            ->expects($this->once())
            ->method('fetchAll')
            ->willReturn([]);

        $rez=$this->technologyRepository->checkIfTagExists($tag);
        Assert::assertEquals(false,$rez);



    }

    public function testCheckIfTechnologyAlreadyExists()
    {

        $tech= new Technology("Magento","picture");

        $this->connectionMock
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('select')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('from')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->once())
            ->method('where')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('setParameter')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('execute')
            ->willReturn($this->statementMock);

        $this->statementMock
            ->expects($this->once())
            ->method('fetchAll')
            ->willReturn([]);

        $rez=$this->technologyRepository->checkIfTechnologyAlreadyExists($tech->getName());
        Assert::assertEquals(false,$rez);

    }

    public function testGetIdForTag()
    {

        $tag= new Tag("frontend");
        $id=$tag->getId();

        $this->connectionMock
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('select')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('from')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->once())
            ->method('where')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('setParameter')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('execute')
            ->willReturn($this->statementMock);

        $this->statementMock
            ->expects($this->once())
            ->method('fetch')
            ->will($this->returnArgument('id'));


        $dbid=$this->technologyRepository->getIdForTag("frontend");

        self::assertEquals($id,$dbid);

    }

    public function testGetTechnologyId()
    {

        $tech=new Technology("Symfony 4","picture");

        $id=$tech->getId();

        $this->connectionMock
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('select')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('from')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->once())
            ->method('where')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('setParameter')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('execute')
            ->willReturn($this->statementMock);

        $this->statementMock
            ->expects($this->once())
            ->method('fetch')
            ->will($this->returnArgument('id'));



        $dbid=$this->technologyRepository->getTechnologyId("Symfony 4");

        self::assertEquals($id,$dbid);


    }

    public function testInsertTechnology()
    {
        $result=true;
       $this->connectionMock
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('insert')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->any())
            ->method('setValue')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->any())
            ->method('setParameter')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->once())
            ->method('execute')
            ->willReturn($result);

        $rez=$this->technologyRepository->insertTechnology("techName","picture");

        Assert::assertEquals($result,$rez);


    }


    public function testInsertNewTechnologyTagRelation()
    {


        $result=true;
        $this->connectionMock
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->once())
            ->method('insert')
            ->willReturn($this->queryBuilderMock);

        $this->queryBuilderMock
            ->expects($this->any())
            ->method('setValue')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->any())
            ->method('setParameter')
            ->willReturn($this->queryBuilderMock);
        $this->queryBuilderMock
            ->expects($this->once())
            ->method('execute')
            ->willReturn($result);

        $rez=$this->technologyRepository->insertNewTechnologyTagRelation(1,1);

        Assert::assertEquals($result,$rez);



    }




}
