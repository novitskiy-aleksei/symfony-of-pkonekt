<?php

namespace Pkonekt\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PkonektPostBundle:Default:index.html.twig', array('name' => $name));
    }
}
