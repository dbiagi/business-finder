<?php

namespace Tests\AppBundle\Repository\Elasticsearch;

use BusinessFinder\AppBundle\Entity\Business;
use BusinessFinder\AppBundle\Repository\Elasticsearch\BusinessElasticRepository;
use Tests\AppBundle\Repository\ElasticsearchRepositoryTestCase;

class BusinessElasticRepositoryTest extends ElasticsearchRepositoryTestCase
{
    public function testFindByTerms()
    {
        $terms = 'and';

        /** @var BusinessElasticRepository $repo */
        $repo = $this->manager->getRepository(Business::class);

        $result = $repo->findByKeywords($terms);

        $this->assertTrue(is_array($result));
    }
}