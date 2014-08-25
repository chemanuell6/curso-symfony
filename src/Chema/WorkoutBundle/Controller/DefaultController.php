<?php

namespace Chema\WorkoutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;


/**
* @Route("workout")
*/

class DefaultController extends Controller
{
    /**
     * @Route("/", name="workout_index")	
     * Template("")
     */
    public function indexAction()
    {
 	   $workouts= array(
        array(
                'date' => new \DateTime(),
                'activity'=> 'swimming',
                'hours' => 1
            ),
        array(
                'date' => new \DateTime(),
                'activity' => 'yoga',
                'hours' => 2
            ),
        array(
                'date' => new \DateTime(),
                'activity' => 'gim',
                'hours' => 1.5
            ),
        array(
                'date' => new \DateTime(),
                'activity' => 'running',
                'hours' => 0.5 
            ),
        );
    
    return array (
            'workouts' => $workouts,
            'name' => 'Your Name',
            'age' => 99
        );
    }
}
