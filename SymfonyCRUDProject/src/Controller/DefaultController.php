<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 8/30/2018
 * Time: 1:20 PM
 */

namespace App\Controller;


use App\Entity\User;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Validation\UserValidation;


class DefaultController extends Controller
{
    private $userValidation;

    public function __construct(UserValidation $userValidation)
    {
        $this->userValidation = $userValidation;
    }

    public function indexAction(Request $request)
    {
        $html = '';
        $user= new User();
        $user->setFirstName('FisrtName');
        $user->setLastName('LastName');
        $user->setPassword('abcdfd');

        $html.='IS VALID: '. json_encode($this->userValidation->isValid($user)). '<br/>';

        return $this->render('default/index.html.twig',[
            'html' => $html
        ]);


    }
}