<?php

namespace AppBundle\Controller\PublicController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller {

    /**
     * Homepage
     *
     * @Route("/", name="app_home")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {
        $businessRepo = $this->getDoctrine()->getRepository('AppBundle:Business');
        $businessCategoryRepo = $this->getDoctrine()->getRepository('AppBundle:BusinessCategory');

        return $this->render('pages/home.html.twig', [
            'businesses' => $businessRepo->findAll(),
            'categories' => $businessCategoryRepo->findAll()
        ]);
    }
}
