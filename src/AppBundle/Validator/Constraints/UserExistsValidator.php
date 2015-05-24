<?php

namespace AppBundle\Validator\Constraints;

use AppBundle\AppBundle;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\CollectionValidator;

class UserExistsValidator extends CollectionValidator {

    protected $em;

    public function __construct(EntityManager $entityManager) {
        $this->em = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        $authData = $this->em
            ->getRepository('AppBundle\Entity\AuthorizationData')
            ->findOneBy(array(
                'login' => $value->getLogin(),
                'password' => crypt($value->getPassword(), AppBundle::$hash)
            ));

        if (!$authData) {
            $this->context->buildViolation($constraint->getMessage())
                ->atPath('login')
                ->addViolation();
        }
    }
}