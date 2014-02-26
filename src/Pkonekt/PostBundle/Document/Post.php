<?php

namespace Pkonekt\PostBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedMany;
use Pkonekt\PostBundle\Document\Attach;

/**
 * @ODM\Document
 */
class Post
{
    /**
     * @ODM\Id(strategy="auto")
     */
    private $id;

    /** @ODM\String */
    private $content;

    /** @EmbedMany(targetDocument="Comment") */
    private $comments = array();

    /** @EmbedMany(targetDocument="Attach") */
    private $attaches;

    /**
     * @param Attach $attach
     */
    public function addAttaches(Attach $attach){
        $this->attaches[] = $attach;
    }

    /**
     * @return mixed
     */
    public function getAttaches()
    {
        return $this->attaches;
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
}