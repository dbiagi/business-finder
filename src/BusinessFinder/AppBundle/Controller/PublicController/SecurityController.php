<?php

namespace AppBundle\Controller\PublicController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller {

    /**
     * Página de login
     *
     * @Route("/login", name="login")
     *
     * @return Response
     */
    public function indexAction() {
        $user = $this->getUser();

        if ($user) {
            return $this->redirectToRoute('home');
        }

        return $this->render('pages/login.html.twig');
    }

}
