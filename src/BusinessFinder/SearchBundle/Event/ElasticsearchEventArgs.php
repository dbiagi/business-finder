<?php

namespace BusinessFinder\SearchBundle\Event;

use Elastica\Query\AbstractQuery;

class ElasticsearchEventArgs extends AbstractSearchEventArgs
{
    /** @var AbstractQuery */
    private $query;

    /**
     * Get search query
     *
     * @return AbstractQuery
     */
    public function getQuery()
    {
        return $this->query;
    }

}