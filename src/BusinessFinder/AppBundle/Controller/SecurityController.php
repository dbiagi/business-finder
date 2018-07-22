<?php

namespace BusinessFinder\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends Controller
{

    /**
     * Página de login
     *
     * @Route("/login", name="login")
     *
     * @return Response
     */
    public function indexAction(): Response
    {
        $user = $this->getUser();

        if ($user) {
            return $this->redirectToRoute('home');
        }

        return $this->render('pages/login.html.twig');
    }

    /**
     * @Route("/logout")
     */
    public function logout()
    {
        throw new \RuntimeException('Should not reach this code');
    }
}
