<?php

namespace Pkonekt\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PkonektIndexBundle:Default:index.html.twig', array('name' => ''));
    }
}
