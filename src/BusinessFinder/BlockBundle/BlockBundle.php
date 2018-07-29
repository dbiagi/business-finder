<?php declare(strict_types=1);

namespace BusinessFinder\BlockBundle;

use BusinessFinder\BlockBundle\Block\BlockInterface;
use BusinessFinder\BlockBundle\DependencyInjection\Compiler\BlockAliasPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BlockBundle extends Bundle
{
    /**
     * String that prefix the block service alias.
     */
    public const ALIAS_PREFIX = 'block';

    public function build(ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(BlockInterface::class)
            ->addTag('block');

        $container->addCompilerPass(new BlockAliasPass());
    }
}
