<?php

namespace BusinessFinder\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\Routing\RouterInterface;

class ModuleNavigationMenuBuilder
{
    /** @var FactoryInterface */
    private $factory;

    /** @var RouterInterface */
    private $router;

    private $modules = [
        'Listing' => ['route' => 'listing']
    ];

    public function __construct(FactoryInterface $factory, RouterInterface $router)
    {
        $this->factory = $factory;
        $this->router = $router;
    }

    /**
     * @return ItemInterface
     */
    public function build()
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Listing', ['route' => 'home', 'attributes' => ['class' => 'eita']]);
        $menu->addChild('Event', ['href' => 'global_search']);


        return $menu;
    }
}