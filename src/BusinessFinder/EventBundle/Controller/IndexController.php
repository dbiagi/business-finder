<?php declare(strict_types=1);

namespace BusinessFinder\EventBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class IndexController
 * @Route("/event")
 */
class IndexController extends Controller
{
    /**
     *
     * @Route("/", name="event_home")
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('EventBundle:pages:home.html.twig');
    }
}
