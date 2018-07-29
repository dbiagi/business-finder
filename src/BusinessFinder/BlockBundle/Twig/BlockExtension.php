<?php declare(strict_types=1);

namespace BusinessFinder\BlockBundle\Twig;

use BusinessFinder\BlockBundle\Resolver\BlockAliasResolver;

class BlockExtension extends \Twig_Extension
{
    /** @var BlockAliasResolver */
    private $resolver;

    public function __construct(BlockAliasResolver $resolver)
    {
        $this->resolver = $resolver;
    }

    public function getFunctions()
    {
        return [
            new \Twig_Function('block_render', [$this, 'render'], ['is_safe' => ['html']]),
        ];
    }

    public function render($alias, array $options = []): string
    {
        $block = $this->resolver->resolve($alias);

        $block->setOptions($options);

        return $block->render();
    }
}