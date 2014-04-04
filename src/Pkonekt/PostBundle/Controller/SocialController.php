<?php

namespace Pkonekt\PostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

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

        $likeCounts = $repository->addLikeDislike($post, $this->getUser(), 'like');

        return new JsonResponse(['count' => $likeCounts]);
    }

    public function disLikePostAction($postId)
    {
        $repository = $this->get('doctrine_mongodb')
            ->getManager()
            ->getRepository('PkonektPostBundle:Post');

        $post = $repository->find($postId);

        if (empty($post)) {
            throw $this->createNotFoundException();
        }

        $likeCounts = $repository->addLikeDislike($post, $this->getUser(), 'dislike');

        return new JsonResponse(['count' => $likeCounts]);
    }
} 