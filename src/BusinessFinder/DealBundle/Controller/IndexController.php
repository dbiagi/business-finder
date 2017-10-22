<?php

namespace BusinessFinder\DealBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="deal_home")
     */
    public function indexAction()
    {
        return $this->render('DealBundle:pages:home.html.twig');
    }
}
