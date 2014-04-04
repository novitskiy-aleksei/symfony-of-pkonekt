<?php

namespace Pkonekt\PostBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;
use Pkonekt\PostBundle\Document\Post;

class PostRepository extends DocumentRepository
{
    public function findForUser()
    {
        return $this->createQueryBuilder()
            ->sort('name', 'ASC')
            ->getQuery()
            ->execute();
    }

    public function addLikeDislike(Post $post, $user, $method = 'like')
    {
        $probablyLiked = $this->createQueryBuilder('Post')
            ->field('_id')->equals(new \MongoId($post->getId()))
            ->field($method.'.$id')->equals(new \MongoId($user->getId()))
            ->getQuery()
            ->getSingleResult();

        $isLiked = empty($probablyLiked);

        if (!$isLiked) {
            $this->createQueryBuilder()
                ->update()
                ->field('_id')->equals(new \MongoId($post->getId()))
                ->field($method)->addToSet(\MongoDBRef::create('User', new \MongoId($user->getId())))
                ->getQuery()
                ->execute();
        }

        $post = $this->find($post->getId());

        return $post->getLikes()->count();
    }

} 