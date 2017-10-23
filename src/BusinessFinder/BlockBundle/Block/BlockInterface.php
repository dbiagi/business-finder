<?php

namespace BusinessFinder\BlockBundle\Block;

interface BlockInterface
{
    /**
     * Render a piece of html
     *
     * @return string
     */
    public function render();

    /**
     * Get block name
     *
     * @return string
     */
    public static function getName();
}