<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/3/2018
 * Time: 12:51 PM
 */

namespace App\Controller;
use App\Entity\Technology;
use App\Exceptions\UnexpectedTypeTagException;
use App\Exceptions\EmptyTechnologyException;
use App\Exceptions\TechnologyExistsException;
use App\Exceptions\UnknownTagException;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\TechnologyService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class TechnologyController
{
    private $technologyService;
    private $urlGenerator;
    private $imagesDir;

    /**
     * TechnologyController constructor.
     * @param TechnologyService $technologyService
     * @param UrlGeneratorInterface $urlGenerator
     * @param string $imagesDir
     */
    public function __construct(TechnologyService $technologyService, UrlGeneratorInterface $urlGenerator, string $imagesDir)
    {
        $this->technologyService = $technologyService;
        $this->urlGenerator=$urlGenerator;
        $this->imagesDir = $imagesDir;
    }

    /**
     * @param $id
     * @return string
     */
    public function generateUrlForLocationHeader($id)
    {
        $url=$this->urlGenerator->generate('my_location',array('id'=>$id),UrlGeneratorInterface::ABSOLUTE_URL);
        return $url;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getTechnology(Request $request){
        return new Response();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function newTech(Request $request)
    {
        $name=$request->request->get('name');
        $tag = $request->request->get('tag');

        /**
         * @var $file UploadedFile
         */
        $file = $request->files->get('picture');
//        $newFileName = md5(uniqid());
//        $file->move($this->imagesDir, $newFileName);
//        $tech = new Technology($name,$this->imagesDir . DIRECTORY_SEPARATOR . $newFileName);

        $tech = new Technology($name,$file);


        try{
            $this->technologyService->add($tech,$tag);
            $id = $this->technologyService->getIdForTechnology($tech->getName());

        }catch (EmptyTechnologyException $ex){
            throw new BadRequestHttpException($ex->getMessage(), $ex);
        }catch (TechnologyExistsException $ex) {
            throw new ConflictHttpException("Technology Name Already Exists!", $ex);
        }catch (UnknownTagException $ex){
            throw new BadRequestHttpException("The given tag does not exist in the database!",$ex);
        }

        $response = new Response("Technology added successfully!",Response::HTTP_CREATED);
        $url = $this->generateUrlForLocationHeader($id);
        $response->headers->set("Location",$url);
        //$response->headers->clearCookie('sf_redirect');

        return $response;
    }
}