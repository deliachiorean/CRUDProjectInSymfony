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

        $tag="backend";

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

        $this->technologyRepository->checkIfTagExists($tag);



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

        $this->technologyRepository->checkIfTechnologyAlreadyExists($tech->getName());

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
            ->method('fetch');


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
            ->method('fetch');


        $dbid=$this->technologyRepository->getTechnologyId("Symfony 4");

        self::assertEquals($id,$dbid);


    }

    public function testInsertTechnology()
    {
//         $technology=new Technology("tech","pict");
//
//         $connection=$this->createMock(Connection::class );
//         $connection->expects($this->any())
//             ->method('connect')
//             ->willReturn($connection);
//         $repositoryTechnology= new TechnologyRepository($connection);
//         $this->assertEquals(true,$repositoryTechnology->insertTechnology($technology->getName(),$technology->getPicture()));



    }


    public function testInsertNewTechnologyTagRelation()
    {
//        $tag= new Tag("tagname");
//        $tech= new Technology("techname","picture");
//
//        $this->connectionMock
//            ->expects($this->once())
//            ->method('createQueryBuilder')
//            ->willReturn($this->queryBuilderMock);
//
//        $this->queryBuilderMock
//            ->expects($this->once())
//            ->method('insert')
//            ->willReturn($this->queryBuilderMock);
//
//        $this->queryBuilderMock
//            ->expects($this->once())
//            ->method('setValue')
//            ->willReturn($this->queryBuilderMock);
//
//
//        $this->queryBuilderMock
//            ->expects($this->once())
//            ->method('setParameter')
//            ->willReturn($this->queryBuilderMock);
//
//        $this->queryBuilderMock
//            ->expects($this->once())
//            ->method('execute')
//            ->willReturn($this->statementMock);



    }




}
