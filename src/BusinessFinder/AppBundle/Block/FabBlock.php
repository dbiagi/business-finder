<?php declare(strict_types=1);

namespace BusinessFinder\AppBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;

/**
 * Floating action button block
 */
class FabBlock extends BaseBlock
{
    public const NAME = 'fab';

    /**
     * Get block name
     *
     * @return string
     */
    public static function getName(): string
    {
        return self::NAME;
    }

    /**
     * {@inheritdoc}
     */
    public function render(): string
    {
        return $this->twig->render('blocks/fab.html.twig');
    }
}