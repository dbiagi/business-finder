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
     * {@inheritdoc}
     */
    public function render(): string
    {
        return $this->twig->render('@Search/block/searchbar.html.twig');
    }
}