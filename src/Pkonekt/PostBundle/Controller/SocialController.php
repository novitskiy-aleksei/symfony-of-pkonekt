<?php

namespace Pkonekt\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SocialController extends Controller
{
    public function likePostAction($postId)
    {
        $repository = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('PkonektPostBundle:Post');

        $post = $repository->find($postId);

        if (empty($post)) {
            throw $this->createNotFoundException();
        }

        $likeCounts = $repository->addLike($post, $this->getUser(), 'like');

        // TODO: finish him!

        return $likeCounts;
    }

    public function disLikePostAction($postId)
    {

    }
} 