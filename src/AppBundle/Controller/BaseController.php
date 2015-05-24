<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class BaseController extends Controller
{
    protected function shouldBeAuthorized()
    {
        if (!$this->get('security_service')->isAuthorized($this)) {
            return $this->redirectToRoute('authorization');
        }
    }

    protected function updateUserActivity()
    {
        $session = new Session();
        if (!$session->get('userInfo')) {
            return;
        }

        $activityId = $session->get('userInfo')['activityId'];

        $activity = $this->getDoctrine()
            ->getRepository('AppBundle\Entity\Activity')
            ->find($activityId);

        $em = $this->getDoctrine()->getManager();
        $activity->setTimestamp(time());
        $em->persist($activity);
        $em->flush();
    }
}