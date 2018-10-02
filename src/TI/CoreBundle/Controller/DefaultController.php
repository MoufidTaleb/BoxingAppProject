<?php

namespace TI\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TICoreBundle:Default:index.html.twig');
    }
}
