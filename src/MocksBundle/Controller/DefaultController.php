<?php

namespace MocksBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    /**
     * @Route("/map", name="interactive-map")
     */
    public function interactiveMapAction()
    {
        return $this->render('AppBundle:map:interactiveMap.html.twig');
    }

    /**
     * @Route("/orders", name="order-list")
     */
    public function orderListAction()
    {
        return $this->render('AppBundle:orders:listOfOrders.html.twig');
    }

    /**
     * @Route("/new-order", name="new-order")
     */
    public function newOrderAction()
    {
        return $this->render('AppBundle:orders:newOrder.html.twig');
    }

    /**
     * @Route("/operators", name="operators-list")
     */
    public function operatorsListAction()
    {
        return $this->render('AppBundle:operators:operatorsList.html.twig');
    }


    /**
     * @Route("/drivers", name="drivers-list")
     */
    public function driversListAction()
    {
        return $this->render('AppBundle:drivers:driversList.html.twig');
    }

    /**
     * @Route("/operator", name="operator")
     * @Method("GET")
     */
    public function operatorAction()
    {
        return $this->render('AppBundle:operators:operator.html.twig');
    }

    /**
     * @Route("/driver", name="driver")
     * @Method("GET")
     */
    public function driverAction()
    {
        return $this->render('AppBundle:drivers:driver.html.twig');
    }

    /**
     * @Route("/operator", name="postOperator")
     * @Method("POST")
     */
    public function operatorPostAction()
    {
        return $this->render('AppBundle:common:operatorDriverSuccess.html.twig', array(
            'operatorOrDriver' => 'Operator',
            'userName' => '1000_dmitry.papka',
            'password' => '3847242'
        ));
    }

    /**
     * @Route("/driver", name="postDriver")
     * @Method("POST")
     */
    public function driverPostAction()
    {
        return $this->render('AppBundle:common:operatorDriverSuccess.html.twig', array(
            'operatorOrDriver' => 'Driver',
            'userName' => '1000_dmitry.papka',
            'password' => '3847242'
        ));
    }
}