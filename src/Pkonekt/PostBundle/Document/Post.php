<?php

namespace Pkonekt\PostBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Pkonekt\PostBundle\Document\Attach;
use Doctrine\ORM\Mapping\Column;

/**
 * @ODM\Document
 * @ODM\Document(repositoryClass="Pkonekt\PostBundle\Repository\PostRepository")
 */
class Post
{
    /**
     * @ODM\Id(strategy="auto")
     */
    private $id;

    /** @ODM\String */
    private $content;

    /** @ODM\ReferenceMany(targetDocument="Comment") */
    private $comments = array();

    /** @ODM\String */
    private $attach;

    /** @ODM\ReferenceOne(targetDocument="Pkonekt\UserBundle\Document\User") */
    private $user;

    /**
     * @Column(type="\DateTime")
     */
    private $created;

    /**
     * @Column(type="\DateTime")
     */
    private $updated;

    /** @ODM\Boolean */
    private $isRich = 0;

    public function __construct()
    {
        // constructor is never called by Doctrine
        $this->created = $this->updated = new \DateTime("now");
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param Comment $comment
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }

    /**
     * @param mixed $attach
     */
    public function setAttach($attach)
    {
        $this->attach = $attach;
    }

    /**
     * @return mixed
     */
    public function getAttach()
    {
        return $this->attach;
    }

    /**
     * @param mixed $isRich
     */
    public function setIsRich($isRich)
    {
        $this->isRich = $isRich;
    }

    /**
     * @return mixed
     */
    public function getIsRich()
    {
        return $this->isRich;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}