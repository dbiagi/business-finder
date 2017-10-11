<?php

namespace Tests\AppBundle\Repository\Elasticsearch;

use BusinessFinder\AppBundle\Entity\Listing;
use BusinessFinder\AppBundle\Repository\Elasticsearch\BusinessElasticRepository;
use Tests\AppBundle\Repository\ElasticsearchRepositoryTestCase;

class BusinessElasticRepositoryTest extends ElasticsearchRepositoryTestCase
{
    public function testFindByTerms()
    {
        $terms = 'and';

        /** @var BusinessElasticRepository $repo */
        $repo = $this->manager->getRepository(Listing::class);

        $result = $repo->findByKeywords($terms);

        $this->assertTrue(is_array($result));
    }
}