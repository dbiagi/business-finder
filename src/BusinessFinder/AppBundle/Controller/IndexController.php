<?php

namespace BusinessFinder\AppBundle\Controller;

use BusinessFinder\AppBundle\Form\SearchType;
use BusinessFinder\ListingBundle\Entity\Listing;
use BusinessFinder\ListingBundle\Repository\ListingRepository;
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
     * @param PaginatorInterface $paginator
     * @return Response
     *
     * @Route("/", name="home")
     */
    public function indexAction(Request $request, PaginatorInterface $paginator)
    {
        $keywords = $request->get(SearchType::NAME);
        $page = $request->get('page', 1);

        /** @var ListingRepository $repo */
        $repo = $this->get('doctrine.orm.default_entity_manager')->getRepository(Listing::class);

        $entities = $repo->findBy([
            'featured' => true,
        ]);

        $businesses = $paginator->paginate($entities, $page, self::LIMIT_PER_PAGE);

        return $this->render('pages/home.html.twig', [
            'businesses' => $businesses,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @Route("/search", name="global_search")
     */
    public function searchAction(Request $request)
    {
        $data = $request->get(SearchType::NAME);

        $form = $this->createForm(SearchType::class, $data);

        return $this->render('search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
