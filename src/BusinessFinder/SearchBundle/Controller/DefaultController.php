<?php declare(strict_types=1);

namespace BusinessFinder\SearchBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('SearchBundle:Default:index.html.twig');
    }
}
