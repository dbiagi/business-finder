<?php

namespace AppBundle\Controller\PublicController;

use AppBundle\Form\SearchType;
use Doctrine\ORM\EntityManagerInterface;
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
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param PaginatorInterface $paginator
     * @return Response
     * @Route("/", name="app_home")
     */
    public function indexAction(Request $request, EntityManagerInterface $em, PaginatorInterface $paginator)
    {
        $criteria = $request->get(SearchType::NAME);
        $page = $request->get('page', 1);

        $entities = $em->getRepository('AppBundle:Business')->findByCriteria($criteria);

        $businesses = $paginator->paginate($entities, $page, self::LIMIT_PER_PAGE);

        return $this->render('pages/home.html.twig', [
            'businesses' => $businesses,
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
}
