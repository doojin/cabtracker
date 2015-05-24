<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    protected function shouldBeAuthorized()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
    }
}