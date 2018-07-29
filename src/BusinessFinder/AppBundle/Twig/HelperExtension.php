<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: diego
 * Date: 12/10/17
 * Time: 01:02
 */

namespace BusinessFinder\AppBundle\Twig;

class HelperExtension extends \Twig_Extension
{
    /** @var \Twig_Environment */
    private $environment;

    public function __construct(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    public function getFunctions()
    {
        return [

        ];
    }
}