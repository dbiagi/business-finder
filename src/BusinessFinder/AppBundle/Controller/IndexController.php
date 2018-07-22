<?php

namespace BusinessFinder\AppBundle\Controller;

use BusinessFinder\AppBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    public const LIMIT_PER_PAGE = 9;

    /**
     * Homepage
     *
     * @return Response
     *
     * @Route("/", name="home")
     */
    public function indexAction(): Response
    {
        return $this->render('pages/home.html.twig');
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/search", name="global_search")
     */
    public function searchAction(Request $request): Response
    {
        $data = $request->get(SearchType::NAME);

        $form = $this->createForm(SearchType::class, $data);

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
