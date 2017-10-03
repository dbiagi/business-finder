<?php
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 11/06/17
 * Time: 21:32
 */

namespace BusinessFinder\AppBundle\Elastica;


use FOS\ElasticaBundle\Persister\ObjectPersister;
use Psr\Container\ContainerInterface;

class ObjectPersisterFactory
{
    /** @var ContainerInterface */
    private $container;

    function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Crate object persister
     *
     * @param string $type Elastic type
     * @return ObjectPersister
     */
    public function createObjectPersister($type)
    {
        $index = $this->container->get('fos_elastica.index')->getOriginalName();

        return $this->container->get(sprintf('fos_elastica.object_persister.default.%s', $type));
    }
}