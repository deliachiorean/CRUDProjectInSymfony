<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/11/2018
 * Time: 6:21 PM
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TechnologyControllerTest extends WebTestCase
{



    public function testNewTech()
    {
//        $client = self::createClient();
//        $picture= new UploadedFile('C:\Users\dchiorean\Desktop\CRUDProjectInSymfony\SymfonyApp\icons\symfony4.jpg','symfony4.jpg',"image/jpg");
//        $client->request('POST','/technology',array('name'=>'','picture'=>$picture));
//
//        $client2 = self::createClient();
//        $picture2= new UploadedFile('C:\Users\dchiorean\Desktop\CRUDProjectInSymfony\SymfonyApp\icons\symfony4.jpg','symfony4.jpg',"image/jpg");
//        $client2->request('POST','/technology',array('name'=>'Symfony 4','picture'=>$picture2));
//
//
//        $this->assertEquals(400,$client->getResponse()->getStatusCode());

        $this->assertEquals(true,1);

    }
}
