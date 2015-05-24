<?php

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use AppBundle\Validator\Constraints\UserExists;

/**
 * Class AuthorizationModel
 * @package AppBundle\Form\Model
 * @UserExists
 */
class AuthorizationModel {
    /**
     * @Assert\NotBlank(message = "Login cannot be empty")
     */
    protected $login;

    /**
     * @Assert\NotBlank(message = "Password cannot be empty")
     */
    protected $password;

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}