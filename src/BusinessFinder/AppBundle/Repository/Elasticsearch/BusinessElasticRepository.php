<?php

namespace BusinessFinder\AppBundle\Repository\Elasticsearch;

use Elastica\QueryBuilder;
use FOS\ElasticaBundle\Paginator\PaginatorAdapterInterface;
use FOS\ElasticaBundle\Repository;

class BusinessElasticRepository extends Repository
{
    /**
     * @param $keywords
     * @return PaginatorAdapterInterface
     */
    public function findByKeywords($keywords)
    {
        $terms = [
            'title'           => ['value' => $keywords, 'boost' => 1.8],
            'categories.name' => ['value' => $keywords, 'boost' => 1.6],
            'address'         => ['value' => $keywords, 'boost' => 1.4],
            'description'     => ['value' => $keywords],
            'city'            => ['value' => $keywords],
        ];

        $qb = new QueryBuilder();
        $query = $qb->query()->bool();

        foreach ($terms as $field => $term) {
            $query->addMust([
                $qb->query()->term([$field => $term]),
            ]);
        }

        return $this->finder->createPaginatorAdapter($query);
    }

    public function findFeatured()
    {
        $qb = new QueryBuilder();
        $query = $qb->query()->bool();

        $query->addShould(
            $qb->query()->term(['featured' => ['value' => true, 'boost' => 1.2]])
        );

        return $this->finder->createPaginatorAdapter($query);
    }
}