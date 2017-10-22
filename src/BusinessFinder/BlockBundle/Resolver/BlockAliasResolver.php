<?php

namespace BusinessFinder\BlockBundle\Resolver;

use BusinessFinder\BlockBundle\Block\BlockInterface;
use BusinessFinder\BlockBundle\BlockBundle;
use BusinessFinder\BlockBundle\Exception\BlockNotFoundException;
use Psr\Container\ContainerInterface;

class BlockAliasResolver
{
    /** @var ContainerInterface */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Resolve block by alias
     *
     * @param $name
     * @return BlockInterface
     * @throws BlockNotFoundException
     */
    public function resolve($name)
    {
        $alias = sprintf('%s_%s', BlockBundle::ALIAS_PREFIX, $name);
        if(!$this->container->has($alias)) {
            throw new BlockNotFoundException($name);
        }

        return $this->container->get($alias);
    }
}