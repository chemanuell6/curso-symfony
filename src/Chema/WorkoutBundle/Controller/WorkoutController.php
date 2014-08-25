<?php

namespace Chema\WorkoutBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Chema\WorkoutBundle\Entity\Workout;
use Chema\WorkoutBundle\Form\WorkoutType;

/**
 * Workout controller.
 *
 * @Route("/workout")
 */
class WorkoutController extends Controller
{

    /**
     * Lists all Workout entities.
     *
     * @Route("/", name="workoutcrud")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ChemaWorkoutBundle:Workout')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Workout entity.
     *
     * @Route("/", name="workoutcrud_create")
     * @Method("POST")
     * @Template("ChemaWorkoutBundle:Workout:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Workout();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('workoutcrud_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Workout entity.
     *
     * @param Workout $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Workout $entity)
    {
        $form = $this->createForm(new WorkoutType(), $entity, array(
            'action' => $this->generateUrl('workoutcrud_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Workout entity.
     *
     * @Route("/new", name="workoutcrud_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Workout();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Workout entity.
     *
     * @Route("/{id}", name="workoutcrud_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChemaWorkoutBundle:Workout')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workout entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Workout entity.
     *
     * @Route("/{id}/edit", name="workoutcrud_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChemaWorkoutBundle:Workout')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workout entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Workout entity.
    *
    * @param Workout $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Workout $entity)
    {
        $form = $this->createForm(new WorkoutType(), $entity, array(
            'action' => $this->generateUrl('workoutcrud_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Workout entity.
     *
     * @Route("/{id}", name="workoutcrud_update")
     * @Method("PUT")
     * @Template("ChemaWorkoutBundle:Workout:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ChemaWorkoutBundle:Workout')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Workout entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('workoutcrud_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Workout entity.
     *
     * @Route("/{id}", name="workoutcrud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ChemaWorkoutBundle:Workout')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Workout entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('workoutcrud'));
    }

    /**
     * Creates a form to delete a Workout entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('workoutcrud_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
