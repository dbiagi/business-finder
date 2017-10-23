<?php

namespace BusinessFinder\AppBundle\Controller;

use BusinessFinder\AppBundle\Form\SearchType;
use BusinessFinder\ListingBundle\Entity\Listing;
use BusinessFinder\ListingBundle\Repository\ListingRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    const LIMIT_PER_PAGE = 9;

    /**
     * Homepage
     *
     * @return Response
     *
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('pages/home.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/search", name="global_search")
     */
    public function searchAction(Request $request)
    {
        $data = $request->get(SearchType::NAME);

        $form = $this->createForm(SearchType::class, $data);

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
