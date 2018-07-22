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
     * Return a piece of html
     *
     * @return string
     */
    public function render(): string;

    public function getOptions(): array;

    public function setOptions(array $options): void;
}