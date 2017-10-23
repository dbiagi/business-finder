<?php

namespace BusinessFinder\AppBundle\Block;

use BusinessFinder\BlockBundle\Block\BaseBlock;
use BusinessFinder\BlockBundle\Block\BlockInterface;

class ModuleNavbarBlock extends BaseBlock
{
    const NAME = 'modules_navbar';

    /**
     * {@inheritdoc}
     */
    public function render()
    {
        $modules = [
            [
                'name' => 'Home',
                'route' => 'home'
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

        return $this->twig->render(':blocks:navbar.html.twig', [
            'modules' => $modules
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return self::NAME;
    }
}