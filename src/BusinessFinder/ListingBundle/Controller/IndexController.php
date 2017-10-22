<?php

namespace BusinessFinder\ListingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="listing_home")
     */
    public function indexAction()
    {
        return $this->render('ListingBundle:pages:home.html.twig');
    }
}