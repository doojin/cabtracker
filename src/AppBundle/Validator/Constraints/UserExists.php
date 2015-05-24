<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Doctrine\Common\Annotations\Annotation;

/**
 * Class UserExists
 * @package AppBundle\Validator\Constraints
 * @Annotation
 */
class UserExists extends Constraint
{
    protected $message = 'User does not exist';

    public function validatedBy()
    {
        return 'user_exists_validator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }


}