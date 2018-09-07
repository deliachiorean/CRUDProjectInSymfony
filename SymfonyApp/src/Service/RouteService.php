<?php
/**
 * Created by PhpStorm.
 * User: dchiorean
 * Date: 9/7/2018
 * Time: 5:36 PM
 */

namespace App\Service;


use Symfony\Component\Routing\Exception\InvalidParameterException;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;

class RouteService {
    private $router;
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->router=$urlGenerator;
    }



}