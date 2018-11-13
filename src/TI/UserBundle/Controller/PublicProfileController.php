<?php

namespace TI\UserBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicProfileController extends Controller
{
    public function publicShowAction($id, $page)
    {
        if ($page == null) {
            $page = 1;
        }
        if ($page < 1) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }

        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array(
            'id' => $id
        ));

        $nbPerPage = 5;

        $advertRepository = $this->getDoctrine()->getManager()->getRepository('TIPlatformBundle:Advert');
        $userLastAdverts = $advertRepository->getPaginatedAdvertsByUser($user, $nbPerPage, $page);

        $nbPages = ceil(count($userLastAdverts) / $nbPerPage);

        if ($page > $nbPages) {
            $this->createNotFoundException("La page" . $page . "n'existe pas!");
        } //TODO Make this working

        return $this->render('TIUserBundle:Profile:publicShow.html.twig', array(
            'user' => $user,
            'userLastAdverts' => $userLastAdverts,
            'page' => $page,
            'nbPages' => $nbPages
        ));
    }
}