<?php

namespace BusinessFinder\BlockBundle\DependencyInjection\Compiler;

use BusinessFinder\BlockBundle\BlockBundle;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Create an alias for all services that implements BlockInterface.
 */
class BlockAliasPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('block');

        foreach ($services as $class => $config) {
            $container->setAlias(sprintf('%s_%s', BlockBundle::ALIAS_PREFIX, $class::getName()), $class);
        }
    }
}