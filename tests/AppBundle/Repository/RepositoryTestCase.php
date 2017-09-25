<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 23/09/17
 * Time: 10:31
 */

namespace Tests\AppBundle\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RepositoryTestCase extends KernelTestCase
{
    /** @var  EntityManagerInterface */
    private $em;

    protected function setUp()
    {
        self::bootKernel();

        $this->em = self::$kernel->getContainer()
            ->get('doctrine.orm.default_entity_manager');
    }

}