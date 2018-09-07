<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 12:51 PM
 */

namespace App\Controller;
use App\Entity\Technology;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TechnologyService;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class TechnologyController extends Controller
{
    private $technologyService;

    public function __construct(TechnologyService $technologyService)
    {
        $this->technologyService = $technologyService;
    }

    public function newTech(Request $request){


        $name=$request->request->get('name');
        $file = $request->files->get('picture');

//        $file->move("C:\Users\dchiorean\Desktop\CRUDProjectInSymfony\SymfonyApp\UploadedPictures",$file->getClientOriginalName());
//
//        $file=$file->getClientOriginalName();
//


        $tag = $request->request->get('tag');


        $tech= new Technology($name,$file);
//        var_dump($tech);
//        die();



        $result=$this->technologyService->add($tech,$tag);

        var_dump($result);
        die();



        if((in_array("tagName", $result)) || (in_array("errors",$result))){
            $response= new Response(Response::HTTP_BAD_REQUEST);
            $response->setStatusCode(400);
            return $response;
        }else if(in_array("technologyName",$result)){
            $response= new Response(Response::HTTP_CONFLICT);
            $response->setStatusCode(409);
            return $response;
        }else if(sizeof($result)==1 && $result[0]=="OK"){
                $response= new Response(Response::HTTP_CREATED);
                $response->setStatusCode(201);
                $response->headers->set('Location', "http://127.0.0.1:8000/insert/" . $name);
                return $response;
        }
        else
            return $result;

    }


}