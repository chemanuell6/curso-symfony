<?php

namespace Chema\WorkoutBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WorkoutType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activity', 'text', array('label' => 'Actividad', 'required' => true))
            ->add('occurrenceDate', 'date', array('label' => 'Fecha', 'required' => true ) )
            ->add('hours', 'text', array('label' => 'Horas', 'required' => true ) )
                    ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Chema\WorkoutBundle\Entity\Workout'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'chema_workoutbundle_workout';
    }
}
