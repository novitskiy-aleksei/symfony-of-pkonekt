<?php

namespace Pkonekt\UserBundle\DataFixtures\ODM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Pkonekt\PostBundle\Document\Attach;
use Pkonekt\PostBundle\Document\Comment;
use Pkonekt\PostBundle\Document\Post;
use Pkonekt\UserBundle\Document\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('admin');
        $userAdmin->setSuperAdmin(true);
        $userAdmin->setPlainPassword('123456');
        $userAdmin->setEnabled(true);
        $manager->persist($userAdmin);
        $manager->flush();

        $postWithComment = new Post();
        $postWithComment->setContent("Im post without any attach, but i have a comment! ");
        $comment = new Comment();
        $comment->setTitle('im comment title');
        $comment->setContent('im comment cocontent');
        $comment->setUser($userAdmin);
        $manager->persist($comment);
        $manager->flush();

        $postWithoutAttach = new Post();
        $postWithoutAttach->setContent("Im post without any attach :( ");
        $userAdmin->addPost($postWithoutAttach);
        $postWithoutAttach->setUser($userAdmin);
        $manager->persist($postWithoutAttach);

        $postWithComment->addComment($comment);
        $userAdmin->addPost($postWithComment);
        $postWithComment->setUser($userAdmin);
        $manager->persist($postWithComment);


        $manager->flush();
    }
}