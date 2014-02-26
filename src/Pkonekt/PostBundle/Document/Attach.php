<?php

namespace Pkonekt\PostBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class Attach
{
    /**
     * @ODM\Id(strategy="auto")
     */
    private $id;

    /** @ODM\Int */
    private $type;

    /** @ODM\String */
    private $content;
}