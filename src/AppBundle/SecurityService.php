<?php

namespace AppBundle;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class SecurityService {

    public function isAuthorized()
    {
        $session = new Session();
        if (!$session->get('userInfo')) {
            return false;
        }
        return true;
    }
}