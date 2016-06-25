<?php

namespace Junior\EtudeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JuniorEtudeBundle:Default:index.html.twig');
    }
}
