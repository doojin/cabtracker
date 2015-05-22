<?php

namespace MocksBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    /**
     * @Route("/authorization", name="authorization")
     */
    public function authorizationAction()
    {
        return $this->render('MocksBundle:authorization:authorization.html.twig');
    }

}