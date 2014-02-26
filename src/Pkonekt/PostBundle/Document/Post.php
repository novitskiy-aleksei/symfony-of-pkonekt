<?php

namespace Pkonekt\PostBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedMany;

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
    private $comments;

    /** @EmbedMany(targetDocument="Attach") */
    private $attaches;
}