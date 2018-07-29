<?php declare(strict_types=1);

namespace BusinessFinder\BlockBundle\DependencyInjection\Compiler;

use App\BusinessFinder\BlockBundle\Exception\NonUniqueAliasException;
use BusinessFinder\BlockBundle\BlockBundle;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Create an alias for all services that implements BlockInterface.
 */
class BlockAliasPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     * @throws NonUniqueAliasException
     */
    public function process(ContainerBuilder $container)
    {
        $services = $container->findTaggedServiceIds('block');

        foreach ($services as $class => $config) {
            $alias = sprintf('%s_%s', BlockBundle::ALIAS_PREFIX, $class::getName());

            if ($container->has($alias)) {
                throw new NonUniqueAliasException($alias);
            }

            $container->setAlias($alias, new Alias($class, true));
        }
    }
}