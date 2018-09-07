<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 12:51 PM
 */

namespace App\Controller;
use App\Entity\Technology;
use App\Exceptions\EmptyTechnologyException;
use App\Exceptions\TechnologyExistsException;
use App\Exceptions\UnknownTagException;
use App\Repository\TechnologyRepository;
use App\Service\RouteService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TechnologyService;
use Symfony\Component\HttpKernel\Exception\HttpException;


class TechnologyController extends Controller
{
    private $technologyService;
    private $routeService;

    public function __construct(TechnologyService $technologyService)
    {
        $this->technologyService = $technologyService;

    }

    public function newTech(Request $request){


        $name=$request->request->get('name');
        $file = $request->files->get('picture');
        //$file->move("C:\Users\dchiorean\Desktop\CRUDProjectInSymfony\SymfonyApp\UploadedPictures",$file->getClientOriginalName());


        $tag = $request->request->get('tag');


        $tech= new Technology($name,$file);
//        var_dump($tech);
//        die();


        try{
            $this->technologyService->add($tech,$tag);
            $response= new Response("Technology added successfully!",201);
            //$response->headers->set("Location",
            return $response;
        }catch (EmptyTechnologyException $ex){
            var_dump($ex->getMessage());
            die();
            $response= new Response($ex->getMessage(),400);
            $response->headers->set("Location","http://127.0.0.1:8000/insert/" . $name);
            return $response;
        }catch (TechnologyExistsException $ex){
            return new Response("Technology Name Already Exists!",409);
        }catch (UnknownTagException $ex){
            return new Response("The given tag does not exist in the database!",400);
        }

//        $result=$this->technologyService->add($tech,$tag);
////        var_dump($resul
////        die();
//
//
////
//
//        if((in_array("tagName", $result)) || (in_array("errors",$result))){
//            $response= new Response(Response::HTTP_BAD_REQUEST);
//            $response->setStatusCode(400);
//            return $response;
//        }else if(in_array("technologyName",$result)){
//            $response= new Response(Response::HTTP_CONFLICT);
//            $response->setStatusCode(409);
//            return $response;
//        }else
//            if(sizeof($result)==1 && $result[0]=="OK"){
//                $response= new Response(Response::HTTP_CREATED);
//                $response->setStatusCode(201);
//                $response->headers->set('Location', "http://127.0.0.1:8000/insert/" . $name);
//                return $response;
//        }
//        else
//            return new Response("something went wrong!");

    }


}