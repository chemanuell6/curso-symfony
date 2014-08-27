<?php

namespace Chematic\VistaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * @Route("vistas")     
 */

class DefaultController extends Controller
{
    /**
     * @Route("/",name="vistas_index")
     * @Template()
     */
    public function indexAction()
    {
          $workouts = array(
array('date' =>  new \DateTime(), 'activity' => 'swimming', 'hours' => 1),
array('date' =>  new \DateTime(), 'activity' => 'yoga', 'hours' => 2),
array('date' =>  new \DateTime(), 'activity' => 'gym', 'hours' => 1.5),
array('date' =>  new \DateTime(), 'activity' => 'running', 'hours' => 0.5)
);
/*$workouts1 = array('workouts' => $workouts, 'name' => 'Your Name', 'age' => 99);
    return $workouts1;*/
    return array (
	'workouts' => $workouts,
	'name' => 'Jose',
	'age' => 99
    	);
    
    }
}

