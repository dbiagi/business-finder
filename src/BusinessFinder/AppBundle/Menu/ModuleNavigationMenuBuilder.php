<?php

namespace BusinessFinder\AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Knp\Menu\Renderer\TwigRenderer;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;

class ModuleNavigationMenuBuilder
{
    /** @var FactoryInterface */
    private $factory;

    /** @var RouterInterface */
    private $router;

    /** @var TranslatorInterface */
    private $translator;

    public function __construct(FactoryInterface $factory, RouterInterface $router, TranslatorInterface $translator, TwigRenderer $renderer)
    {
        $this->factory = $factory;
        $this->router = $router;
        $this->translator = $translator;

    }

    /**
     * @return ItemInterface
     */
    public function build()
    {
        $menu = $this->factory->createItem('root', [
            'attributes' => [
                'class' => 'tabs tabs-transparent'
            ]
        ]);

        $tabAttr = ['class' => 'tab'];

        $arrayItens = [
            'Listing' => [
                'route' => 'listing_home',
                'attributes' => $tabAttr
            ],
            'Event' => [
                'route' => 'event_home',
                'attributes' => $tabAttr
            ],
            'Deal' => [
                'route' => 'deal_home',
                'attributes' => $tabAttr
            ]
        ];

        foreach ($arrayItens as $name => $config) {
            $menu->addChild($this->translator->trans($name), $config);
        }

        return $menu;
    }
}