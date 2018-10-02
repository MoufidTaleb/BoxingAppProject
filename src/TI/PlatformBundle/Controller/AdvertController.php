<?php

namespace TI\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdvertController extends Controller
{
    public function indexAction($page)
    {
        return $this->render('TIPlatformBundle:Advert:index.html.twig');
    }

    public function viewAction($id)
    {
        return $this->render('TIPlatformBundle:Advert:view.html.twig');
    }

    public function addAction(Request $request)
    {
        return $this->render('TIPlatformBundle:Advert:add.html.twig');
    }

    public function editAction(Request $request, $id)
    {
        return $this->render('TIPlatformBundle:Advert:edit.html.twig');
    }

    public function deleteAction(Request $request, $id)
    {
        return $this->render('TIPlatformBundle:Advert:delete.html.twig');
    }

    public function menuAction()
    {
        return $this->render('TIPlatformBundle:Advert:menu.html.twig');
    }
}