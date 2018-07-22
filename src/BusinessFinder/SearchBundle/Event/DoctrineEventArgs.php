<?php

namespace BusinessFinder\SearchBundle\Event;

use Doctrine\ORM\QueryBuilder;

class DoctrineEventArgs extends AbstractSearchEventArgs
{

    /** @var QueryBuilder */
    private $query;

    /**
     * Get search query
     *
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }
}