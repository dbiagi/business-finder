<?php

namespace BusinessFinder\AppBundle\Block;

use BusinessFinder\BlockBundle\Block\BlockInterface;

class ModuleNavbarBlock implements BlockInterface
{
    const NAME = 'modules_navbar';

    /** @var \Twig_Environment */
    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

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
    public function getName()
    {
        return self::NAME;
    }
}