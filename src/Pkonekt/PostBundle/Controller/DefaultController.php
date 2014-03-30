<?php

namespace Pkonekt\PostBundle\Controller;

use Pkonekt\PostBundle\Document\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function createAction(Request $request)
    {
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->add('content', 'textarea')
            ->add('attach', 'text')
            ->add('isRich', 'hidden')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $post->setUser($this->getUser());
            $this->get('doctrine_mongodb')->getManager()->persist($post);
            $this->get('doctrine_mongodb')->getManager()->flush();

            return $this->redirect('/');
        }

        return $this->render('PkonektPostBundle:Default:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function viewAction($id)
    {
        $post = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('PkonektPostBundle:Post')
            ->find($id);

        return $this->render('PkonektPostBundle:Default:view.html.twig', ['post' => $post]);
    }
}
