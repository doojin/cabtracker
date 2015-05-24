<?php

namespace MocksBundle\Controller;

use AppBundle\Controller\BaseController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends BaseController {

    /**
     * @Route("/map", name="interactive-map")
     */
    public function interactiveMapAction()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
        $this->updateUserActivity();
        return $this->render('AppBundle:map:interactiveMap.html.twig');
    }

    /**
     * @Route("/orders", name="order-list")
     */
    public function orderListAction()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
        $this->updateUserActivity();
        return $this->render('AppBundle:orders:listOfOrders.html.twig');
    }

    /**
     * @Route("/new-order", name="new-order")
     */
    public function newOrderAction()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }

        $this->updateUserActivity();
        return $this->render('AppBundle:orders:newOrder.html.twig');
    }


    /**
     * @Route("/drivers", name="drivers-list")
     */
    public function driversListAction()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
        $this->updateUserActivity();
        return $this->render('AppBundle:drivers:driversList.html.twig');
    }

    /**
     * @Route("/driver", name="driver")
     * @Method("GET")
     */
    public function driverAction()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
        $this->updateUserActivity();
        return $this->render('AppBundle:drivers:driver.html.twig');
    }

    /**
     * @Route("/driver", name="postDriver")
     * @Method("POST")
     */
    public function driverPostAction()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
        $this->updateUserActivity();
        return $this->render('AppBundle:common:operatorDriverSuccess.html.twig', array(
            'operatorOrDriver' => 'Driver',
            'userName' => '1000_dmitry.papka',
            'password' => '3847242'
        ));
    }
}