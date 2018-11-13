<?php

namespace TI\UserBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use FOS\UserBundle\Model\UserInterface;
class ProfileController extends BaseController
{
    public function showAction($page)
    {
        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        $nbPerPage = 5;

        $advertRepository = $this->getDoctrine()->getManager()->getRepository('TIPlatformBundle:Advert');
        $userLastAdverts = $advertRepository->getPaginatedAdvertsByUser($user, $nbPerPage, $page);

        $nbPages = ceil(count($userLastAdverts) / $nbPerPage);

        if($page > $nbPages){
            $this->createNotFoundException("La page".$page."n'existe pas!");
        } //TODO Make this working

        return $this->render('@FOSUser/Profile/show.html.twig', array(
            'user' => $user,
            'userLastAdverts' => $userLastAdverts,
            'nbPages' => $nbPages,
            'page' => $page
        ));
    }
}