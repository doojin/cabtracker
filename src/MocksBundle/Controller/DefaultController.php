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

    /**
     * @Route("/", name="new-account")
     */
    public function newAccountAction()
    {
        return $this->render('MocksBundle:authorization:newAccount.html.twig');
    }

    /**
     * @Route("/map", name="interactive-map")
     */
    public function interactiveMapAction()
    {
        return $this->render('MocksBundle:map:interactiveMap.html.twig');
    }

}