<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NewAccountType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', 'text', array(
                'label' => 'Your Login:',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Your Login',
                )
            ))
            ->add('fullName', 'text', array(
                'label' => 'Full Name:',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'First name, Last name',
                )
            ))
            ->add('password', 'password', array(
                'label' => 'Your Password:',
                'required' => false,
                'attr' => array(
                    'placeholder' => '**********',
                )
            ))
            ->add('passwordAgain', 'password', array(
                'label' => 'Password Again:',
                'required' => false,
                'attr' => array(
                    'placeholder' => '**********',
                )

            ))
            ->add('companyName', 'text', array(
                'label' => 'Company Name:',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Company Name',
                )
            ))
            ->add('create', 'submit', array(
                'label' => 'Create',
                'attr' => array(
                    'class' => 'small button'
                )
            ));
    }

    public function getName()
    {
        return 'newAccount';
    }
}