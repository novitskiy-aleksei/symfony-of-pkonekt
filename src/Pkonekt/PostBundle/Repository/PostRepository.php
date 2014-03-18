<?php

namespace Pkonekt\PostBundle\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

class PostRepository extends DocumentRepository
{
    public function findForUser()
    {
        return $this->createQueryBuilder()
            ->sort('name', 'ASC')
            ->getQuery()
            ->execute();
    }
} 