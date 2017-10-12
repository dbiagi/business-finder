<?php

namespace BusinessFinder\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Routing\Router;

class ModuleNavigationMenuBuilder
{
    /** @var FactoryInterface */
    private $factory;

    /** @var Router */
    private $router;

    public function __construct(FactoryInterface $factory, Router $router)
    {
        $this->factory = $factory;
        $this->router = $router;
    }

    public function build($modules)
    {
        $menu = $this->factory->createItem('root');

        foreach ($modules as $module) {
            $menu->addChild($module, ['route' => $this->router->generate('')]);
        }
    }
}