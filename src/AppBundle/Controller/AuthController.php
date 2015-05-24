<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AuthorizationData;
use AppBundle\Entity\Company;
use AppBundle\Entity\User;
use AppBundle\Form\Model\NewAccountModel;
use AppBundle\Form\Type\NewAccountType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller {

    /**
     * @Route("/", name="new-account")
     * @Method("GET")
     */
    public function newAccountAction()
    {
        $newAccount = new NewAccountModel();

        $form = $this->createForm(new NewAccountType(), $newAccount);

        return $this->render('AppBundle:authorization:newAccount.html.twig', array(
            'newAccountForm' => $form->createView()
        ));
    }

    /**
     * @Route("/", name="new-account-post")
     * @Method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAccountPostAction(Request $request)
    {
        $newAccount = new NewAccountModel();

        $form = $this->createForm(new NewAccountType(), $newAccount);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();

            $company = new Company();
            $company->setName($data->getCompanyName());

            $administratorRole = $this->getDoctrine()->getRepository('AppBundle\Entity\Role')->findOneById(1);

            $authData = new AuthorizationData();
            $authData->setPassword(password_hash($data->getPassword(), PASSWORD_DEFAULT));
            $authData->setLogin($data->getLogin());

            $user = new User();
            $user->setFullName($data->getFullName());
            $user->setCompany($company);
            $user->setRole($administratorRole);
            $user->setAuthorizationData($authData);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('order-list');
        }

        return $this->render('AppBundle:authorization:newAccount.html.twig', array(
            'newAccountForm' => $form->createView()
        ));
    }
}