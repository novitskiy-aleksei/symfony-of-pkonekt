<?php

namespace Pkonekt\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id)
    {
        $user = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('PkonektUserBundle:User')
            ->find($id);

        return $this->render('PkonektUserBundle:Default:index.html.twig', array('user' => $user));
    }
}
