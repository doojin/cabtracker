<?php

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\Activity;
use AppBundle\Entity\AuthorizationData;
use AppBundle\Entity\User;
use AppBundle\Form\Model\NewDriverModel;
use AppBundle\Form\Type\NewDriverType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DriverController extends BaseController
{
    /**
     * @Route("/driver", name="driver")
     * @Method("GET")
     */
    public function driverAction()
    {
        $this->shouldBeAuthorized();

        $newAccount = new NewDriverModel();

        $form = $this->createForm(new NewDriverType(), $newAccount);

        $this->updateUserActivity();
        return $this->render('AppBundle:drivers:driver.html.twig', array(
            'newDriverForm' => $form->createView()
        ));
    }

    /**
     * @Route("/driver", name="postDriver")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function driverPostAction(Request $request)
    {
        $this->shouldBeAuthorized();

        $newDriver = new NewDriverModel();

        $form = $this->createForm(new NewDriverType(), $newDriver);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $session = new Session();
            $userInfo = $session->get('userInfo');

            $data = $form->getData();

            $company = $em->getRepository('AppBundle\Entity\Company')
                ->find($userInfo['companyId']);

            $authorizationData = new AuthorizationData();
            $login = $company->getId() . '_' . strtolower(str_replace(' ', '.', $data->getFullName()));
            $password = rand(10000, 99999);
            $authorizationData->setLogin($login);
            $authorizationData->setPassword(crypt($password, AppBundle::$hash));

            $activity = new Activity();
            $activity->setTimestamp(0);

            $role = $em->getRepository('AppBundle\Entity\Role')
                ->find(3);

            $user = new User();
            $user->setFullName($data->getFullName());
            $user->setAuthorizationData($authorizationData);
            $user->setCompany($company);
            $user->setRole($role);
            $user->setActivity($activity);

            $em->persist($user);
            $em->flush();

            $this->updateUserActivity();
            return $this->render('AppBundle:common:operatorDriverSuccess.html.twig', array(
                'operatorOrDriver' => 'Driver',
                'userName' => $login,
                'password' => $password
            ));
        }

        $this->updateUserActivity();
        return $this->render('AppBundle:drivers:driver.html.twig', array(
            'newDriverForm' => $form->createView()
        ));
    }

    /**
     * @Route("/drivers", name="drivers-list")
     */
    public function driversListAction()
    {
        $this->shouldBeAuthorized();

        $session = new Session();
        $companyId = $session->get('userInfo')['companyId'];

        $drivers = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle\Entity\User')
            ->findBy(array(
                'role' => 3,
                'company' => $companyId
            ));

        $driversInfo = array();

        foreach ($drivers as $driver) {
            $isOnline = false;
            if (time() - $driver->getActivity()->getTimestamp() < 60*3) {
                $isOnline = true;
            }
            $driversInfo[] = array(
                'name' => $driver->getFullName(),
                'login' => $driver->getAuthorizationData()->getLogin(),
                'isOnline' => $isOnline
            );
        }

        $this->updateUserActivity();
        return $this->render('AppBundle:drivers:driversList.html.twig', array(
            'drivers' => $driversInfo
        ));
    }
}