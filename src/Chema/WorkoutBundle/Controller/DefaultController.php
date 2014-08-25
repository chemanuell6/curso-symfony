<?php

namespace Chema\WorkoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

/**
*@  @Route("/default")
*/

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}/{lastName}", name="ruta_1")	
     * Method("Get","Post")
     * @Route("/hello/", name="ruta_2")
     */
    public function indexAction($lastName="no tiene", $name="algo")
    {
 	   $response = new Response(json_encode(array('name' => $name,'lastName' => $lastName)));
	   $response->headers->set('Content-Type', 'application/json');
	   return $response;
    }
}
