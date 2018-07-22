<?php

namespace BusinessFinder\ListingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @Route("/listing")
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="listing_home")
     */
    public function index(): Response
    {
        return $this->render('@Listing/pages/home.html.twig');
    }
}