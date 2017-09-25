<?php

namespace Tests\AppBundle\Repository\Elasticsearch;

use AppBundle\Entity\Business;
use AppBundle\Repository\Elasticsearch\BusinessElasticRepository;
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