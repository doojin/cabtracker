<?php

namespace AppBundle\Controller;


use AppBundle\AppBundle;
use AppBundle\Entity\AuthorizationData;
use AppBundle\Entity\Company;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Form\Model\NewOperatorModel;
use AppBundle\Form\Type\AuthorizationType;
use AppBundle\Form\Type\NewOperatorType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class OperatorController extends BaseController
{
    /**
     * @Route("/operator", name="operator")
     * @Method("GET")
     */
    public function operatorAction()
    {
        $this->shouldBeAuthorized();

        $newAccount = new NewOperatorModel();

        $form = $this->createForm(new NewOperatorType(), $newAccount);

        return $this->render('AppBundle:operators:operator.html.twig', array(
            'newOperatorForm' => $form->createView()
        ));
    }

    /**
     * @Route("/operator", name="postOperator")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function operatorPostAction(Request $request)
    {
        $this->shouldBeAuthorized();

        $newOperator = new NewOperatorModel();

        $form = $this->createForm(new NewOperatorType(), $newOperator);
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

            $role = $em->getRepository('AppBundle\Entity\Role')
                ->find(2);

            $user = new User();
            $user->setFullName($data->getFullName());
            $user->setAuthorizationData($authorizationData);
            $user->setCompany($company);
            $user->setRole($role);

            $em->persist($user);
            $em->flush();

            return $this->render('AppBundle:common:operatorDriverSuccess.html.twig', array(
                'operatorOrDriver' => 'Operator',
                'userName' => $login,
                'password' => $password
            ));
        }

        return $this->render('AppBundle:operators:operator.html.twig', array(
            'newOperatorForm' => $form->createView()
        ));
    }
}