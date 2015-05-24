<?php

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;


class NewOperatorModel {

    /**
     * @Assert\NotBlank(message = "Full Name cannot be empty")
     */
    protected $fullName;

    protected $login;

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

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

}