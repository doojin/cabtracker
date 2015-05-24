<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AuthorizationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', 'text', array(
                'label' => 'Your Login:',
                'required' => false,
                'attr' => array(
                    'placeholder' => '1000_mylogin',
                )
            ))
            ->add('password', 'password', array(
                'label' => 'Your Password:',
                'required' => false,
                'attr' => array(
                    'placeholder' => '**********',
                )
            ))
            ->add('dologin', 'submit', array(
                'label' => 'Login',
                'attr' => array(
                    'class' => 'small button'
                )
            ));;
    }

    public function getName()
    {
        return 'authorization';
    }
}