<?php

namespace BusinessFinder\AppBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;

/**
 * Floating action button block
 */
class FabBlock extends BaseBlock
{
    const NAME = 'fab';

    /**
     * Get block name
     *
     * @return string
     */
    public static function getName()
    {
        return self::NAME;
    }

    /**
     * Render a piece of html
     *
     * @return string
     */
    public function render()
    {
        return $this->twig->render('blocks/fab.html.twig');
    }
}