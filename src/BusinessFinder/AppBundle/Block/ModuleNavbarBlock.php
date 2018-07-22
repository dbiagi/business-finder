<?php

namespace BusinessFinder\AppBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;

class ModuleNavbarBlock extends BaseBlock
{
    public const NAME = 'navigation_with_modules';

    /**
     * {@inheritdoc}
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
        $modules = [
            [
                'name'  => 'Home',
                'route' => 'home',
            ],
            [
                'name'  => 'Listing',
                'route' => 'listing_home',
            ],
            [
                'name'  => 'Event',
                'route' => 'event_home',
            ],
            [
                'name'  => 'Deal',
                'route' => 'deal_home',
            ],
        ];

        return $this->twig->render('@App/blocks/navigation_with_modules.html.twig', [
            'modules' => $modules,
        ]);
    }
}