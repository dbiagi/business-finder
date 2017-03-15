<?php

namespace AppBundle\Controller\PublicController;

use AppBundle\Form\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller {

    /**
     * Homepage
     *
     * @Route("/", name="app_home")
     *
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request) {
        $criteria = $request->get(SearchType::NAME);
        $page = $request->get('page', 1);

        // @TODO usar os criterios de busca para filtrar a listagem

        $businessRepo = $this->getDoctrine()->getRepository('AppBundle:Business');
        $businessCategoryRepo = $this->getDoctrine()->getRepository('AppBundle:BusinessCategory');

        $businesses = $this->get('knp_paginator')
            ->paginate($businessRepo->findByCriteria($criteria), $page, 10);

        return $this->render('pages/home.html.twig', [
            'businesses' => $businesses,
            'categories' => $businessCategoryRepo->findAll(),
        ]);
    }

    public function searchAction(Request $request) {
        $data = $request->get(SearchType::NAME);

        $form = $this->createForm(SearchType::class, $data);

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
