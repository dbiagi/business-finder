<?php declare(strict_types=1);

namespace BusinessFinder\DealBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @Route("/deal")
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="deal_home")
     */
    public function indexAction(): Response
    {
        return $this->render('DealBundle:pages:home.html.twig');
    }
}
