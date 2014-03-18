<?php

namespace Pkonekt\PostBundle\Controller;

use Pkonekt\PostBundle\Document\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function createAction()
    {
        // create a task and give it some dummy data for this example
        $post = new Post();


        $form = $this->createFormBuilder($post)
            ->add('content', 'textarea')
            ->add('attaches', 'text')
            ->getForm();

        return $this->render('PkonektPostBundle:Default:create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
