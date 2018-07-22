<?php declare(strict_types=1);

namespace App\BusinessFinder\SearchBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;

class SearchBarBlock extends BaseBlock
{
    public const NAME = 'searcbar';

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
     * Render a piece of html
     *
     * @return string
     */
    public function render(): string
    {
        // TODO: Implement render() method.
    }
}