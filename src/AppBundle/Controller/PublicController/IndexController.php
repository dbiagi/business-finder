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

        // @TODO usar os criterios de busca para filtrar a listagem

        $businessRepo = $this->getDoctrine()->getRepository('AppBundle:Business');
        $businessCategoryRepo = $this->getDoctrine()->getRepository('AppBundle:BusinessCategory');

        return $this->render('pages/home.html.twig', [
            'businesses' => $businessRepo->findAll(),
            'categories' => $businessCategoryRepo->findAll()
        ]);
    }

    public function searchAction(Request $request){
        $data = $request->get(SearchType::NAME);

        $form = $this->createForm(SearchType::class, $data);

        return $this->render('search.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
