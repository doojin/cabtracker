<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NewOperatorType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', 'text', array(
                'label' => 'Operator\'s Full Name:',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'First name, Last name',
                    'id' => 'full-name'
                )
            ))
            ->add('login', 'text', array(
                'label' => 'Operator\'s Login:',
                'required' => false,
                'attr' => array(
                    'disabled' => true
                )
            ))
            ->add('submit', 'submit', array(
                'label' => 'Create',
                'attr' => array(
                    'class' => 'small button'
                )
            ));
    }

    public function getName()
    {
        return 'newOperator';
    }
}