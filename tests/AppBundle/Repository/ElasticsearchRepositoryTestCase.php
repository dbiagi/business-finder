<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 22/09/17
 * Time: 23:21
 */

namespace Tests\AppBundle\Repository;

use FOS\ElasticaBundle\Doctrine\RepositoryManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ElasticsearchRepositoryTestCase extends KernelTestCase
{
    /** @var  RepositoryManager */
    protected $manager;

    protected function setUp()
    {
        self::bootKernel();

        $this->manager = static::$kernel->getContainer()
            ->get('fos_elastica.manager');
    }
}