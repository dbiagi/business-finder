<?php

namespace AppBundle\Controller\PublicController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller {

    /**
     * Página de login
     *
     * @Route("/login", name="app_login")
     *
     * @return Response
     */
    public function indexAction() {
        $user = $this->getUser();

        if ($user) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('pages/login.html.twig');
    }

    /**
     * Apenas declarando a rota de logout, o symfony que vai manipular essa rota
     * @Route("/logout", name="app_logout")
     *
     * @throws \Exception
     */
    public function logoutAction() {
        throw new \Exception('Not implemented');
    }
}
