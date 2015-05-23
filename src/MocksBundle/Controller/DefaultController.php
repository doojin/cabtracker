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

    /**
     * @Route("/orders", name="order-list")
     */
    public function orderListAction()
    {
        return $this->render('MocksBundle:orders:listOfOrders.html.twig');
    }

    /**
     * @Route("/new-order", name="new-order")
     */
    public function newOrderAction()
    {
        return $this->render('MocksBundle:orders:newOrder.html.twig');
    }

    /**
     * @Route("/operators", name="operators-list")
     */
    public function operatorsListAction()
    {
        return $this->render('MocksBundle:operators:operatorsList.html.twig');
    }

}