<?php

namespace BusinessFinder\BlockBundle\Block;

interface BlockInterface
{
    /**
     * Get block name
     *
     * @return string
     */
    public static function getName(): string;

    /**
     * Render a piece of html
     *
     * @return string
     */
    public function render(): string;
}