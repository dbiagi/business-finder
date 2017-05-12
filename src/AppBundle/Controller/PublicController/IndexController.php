<?php

namespace AppBundle\Controller\PublicController;

use AppBundle\Form\SearchType;
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
     * @param Request $request
     * @return Response
     *
     * @Route("/", name="app_home")
     */
    public function indexAction(Request $request)
    {
        $criteria = $request->get(SearchType::NAME);
        $page = $request->get('page', 1);

        $businessRepo = $this->get('app.repository.elastic.business');

        $businessCategoryRepo = $this->getDoctrine()->getRepository('AppBundle:BusinessCategory');

        $businesses = $this->get('knp_paginator')
            ->paginate($businessRepo->findByCriteria($criteria), $page, self::LIMIT_PER_PAGE);

        return $this->render('pages/home.html.twig', [
            'businesses' => $businesses,
            'categories' => $businessCategoryRepo->findAll(),
        ]);
    }

    public function searchAction(Request $request)
    {
        $data = $request->get(SearchType::NAME);

        $form = $this->createForm(SearchType::class, $data);

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @param Request $request
     * @return Response
     *
     * @Route("/test")
     */
    public function testAction(Request $request)
    {
        dump($this->get('app.elastica.connection')->getAggregations());

        return new Response;
    }
}
