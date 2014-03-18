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
//        $manager->flush();


        $postWithoutAttach = new Post();
        $postWithoutAttach->setContent("Im post without any attach :( ");
        $userAdmin->addPost($postWithoutAttach);
        $postWithoutAttach->setUser($userAdmin);
        $manager->persist($postWithoutAttach);

        $postWithComment = new Post();
        $postWithComment->setContent("Im post without any attach, but i have a comment! ");
        $comment = new Comment();
        $postWithComment->addComment($comment);
        $userAdmin->addPost($postWithComment);
        $postWithComment->setUser($userAdmin);
        $manager->persist($postWithComment);

        $attach = new Attach();
        $attach->setType(Attach::TYPE_PICTURE);
        $attach->setContent("http://img5.joyreactor.cc/pics/post/full/%D1%81%D1%82%D0%B0%D1%80%D0%B0%D1%8F-%D1%84%D0%BE%D1%82%D0%BE%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D1%8F-%D0%BA%D1%80%D0%B8%D0%BF%D0%BE%D1%82%D0%B0-1094365.jpeg");

        $richyPost = new Post();
        $richyPost->addAttaches($attach);

        $richyPost->setContent("Im richy post with an attach and comment!");
        $userAdmin->addPost($richyPost);
        $manager->persist($richyPost);

        $manager->flush();
    }
}