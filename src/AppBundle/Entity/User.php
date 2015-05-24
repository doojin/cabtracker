<?php

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="full_name", type="string", length=100)
     */
    protected $fullName;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $company;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Role", cascade={"merge", "persist"})
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $role;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\AuthorizationData", cascade={"merge", "persist"})
     * @ORM\JoinColumn(name="authorization_data_id", referencedColumnName="id")
     */
    protected $authorizationData;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Activity", cascade={"merge", "persist"})
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id")
     */
    protected $activity;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationData()
    {
        return $this->authorizationData;
    }

    /**
     * @param mixed $authorizationData
     */
    public function setAuthorizationData($authorizationData)
    {
        $this->authorizationData = $authorizationData;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
    }
}