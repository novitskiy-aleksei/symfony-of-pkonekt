<?php

namespace Pkonekt\PostBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class Comment
{
    /**
     * @ODM\Id(strategy="auto")
     */
    private $id;

    /** @ODM\String */
    private $title;

    /** @ODM\String */
    private $content;
}