<?php

namespace Pkonekt\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $posts = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('PkonektPostBundle:Post')
            ->findForUser();

        return $this->render('PkonektIndexBundle:Default:index.html.twig', array('posts' => $posts));
    }
}
