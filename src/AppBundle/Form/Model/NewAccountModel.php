<?php

namespace AppBundle\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


class NewAccountModel {

    /**
     * @Assert\NotBlank(message = "Login cannot be empty")
     */
    protected $login;

    /**
     * @Assert\NotBlank(message = "Full Name cannot be empty")
     */
    protected $fullName;

    /**
     * @Assert\NotBlank(message = "Password cannot be empty")
     */
    protected $password;

    protected $passwordAgain;

    /**
     * @Assert\NotBlank(message = "Company name cannot be empty")
     */
    protected $companyName;

    /**
     * @param ExecutionContextInterface $context
     * @Assert\Callback
     */
    public function isPasswordAgainMatched(ExecutionContextInterface $context)
    {
        if ($this->password != $this->passwordAgain) {
            $context->buildViolation('Passwords should match')
                ->atPath('passwordAgain')
                ->addViolation();
        }
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

    /**
     * @return mixed
     */
    public function getPasswordAgain()
    {
        return $this->passwordAgain;
    }

    /**
     * @param mixed $passwordAgain
     */
    public function setPasswordAgain($passwordAgain)
    {
        $this->passwordAgain = $passwordAgain;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

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
}