<?php

namespace Epi\IzaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EpiIzaBundle:Default:index.html.twig', array('name' => $name));
    }
}
