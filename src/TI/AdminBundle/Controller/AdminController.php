<?php

namespace TI\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use TI\UserBundle\Form\UserEditByAdminType;


class AdminController extends Controller
{
    public function indexAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $listUsers = $userManager->findUsers();

        return $this->render('TIAdminBundle:Admin:index.html.twig', array(
            'listUsers' => $listUsers,
        ));
    }

    public function editUserAction(Request $request, $id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array(
           'id' => $id
        ));

        if (null === $user){
            throw new NotFoundHttpException("L'utilisateur n'existe pas!");
        }

        $form = $this->createForm(UserEditByAdminType::class, $user);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid())
        {
            $userManager->updateUser($user);

            $request->getSession()->getFlashBag()->add('info', 'Informations modifiées!');

            return $this->redirectToRoute('ti_admin_editUser', array(
                'id' => $id,
            ));
        }
        return $this->render('TIAdminBundle:Admin:editUser.html.twig', array(
           'user' => $user,
            'form' => $form->createView(),
        ));
    }
}