<?php

namespace AppBundle\Controller\PublicController;

use AppBundle\Form\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller {

    const LIMIT_PER_PAGE = 9;

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

        $businessRepo = $this->get('app.repository.elastic.business');

        $businessCategoryRepo = $this->getDoctrine()->getRepository('AppBundle:BusinessCategory');

        $businesses = $this->get('knp_paginator')
            ->paginate($businessRepo->findByCriteria($criteria), $page, self::LIMIT_PER_PAGE);

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

    /**
     * @Route("/test")
     * @param Request $request
     * @return JsonResponse
     */
    public function testAction(Request $request) {
        $query = $request->get('q');

        $results = $this->get('fos_elastica.finder.default.business')->find($query);

        $json = $this->get('serializer')->serialize($results, 'json', [
            'groups' => ['elastic'],
        ]);

        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }
}
