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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TechnologyService;

use Symfony\Component\Routing\Annotation\Route;



class TechnologyController extends Controller
{
    private $technologyService;

    public function __construct(TechnologyService $technologyService)
    {
        $this->technologyService = $technologyService;
    }

//    /**
//     * @param Request $req
//     * @route("/insert"), methods={"POST"}, name='insert_technology'
//     * @return Response
//     */
    public function newTech(Request $request){


        $name=$request->request->get('name');
        $file = $request->files->get('picture');


        $tag = $request->request->get('tag');

        $tech= new Technology($name,$file);
        $result=$this->technologyService->add($tech,$tag);

        if($result=="tagName"){
            return new Response(Response::HTTP_BAD_REQUEST

            );
        }else if($result=="technologyName"){
            return new Response(Response::HTTP_CONFLICT);
        }else {
            $response = new Response(Response::HTTP_CREATED);
            $response->headers->set('Location', "http://127.0.0.1:8000/insert/" . $name);
            return $response;
        }




    }

}