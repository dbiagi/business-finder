<?php

namespace BusinessFinder\AppBundle\Controller\PrivateController;

use BusinessFinder\ListingBundle\Entity\Listing;
use BusinessFinder\ListingBundle\Form\ListingType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CrudController
 *
 * @package AppBundle\Controller\PrivateController
 *
 * @Route("/business")
 */
class CrudController extends Controller
{

    /**
     * @Route("/", name="app_admin")
     *
     * @return Response
     */
    public function indexAction()
    {
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/add", name="app_business_add")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $business = new Listing();
        $form = $this->createForm(ListingType::class, $business);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                try {

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($business);
                    $em->flush();

                    $this->get('app.elastica.connection')->addDocument('business', $business);

                    $this->addFlash('success', 'Loja criada com sucesso.');

                    return $this->redirectToRoute('home');
                } catch (\Exception $e) {
                    $this->addFlash('error', $e->getMessage());
                }
            } else {
                $this->addFlash('error',
                    'Foram encontrado alguns dados inválidos no formulário.');
            }
        }

        return $this->render('admin/business/crud.html.twig', [
            'form' => $form->createView(),
            'map'  => $this->get('app.map_factory')->createMap(),
        ]);
    }

    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"}, name="app_business_edit")
     *
     * @param Request $request
     * @param Listing $business
     * @return Response
     */
    public function editAction(Request $request, Listing $business)
    {
        $form = $this->createForm(ListingType::class, $business);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($business);
                    $em->flush();

                    $this->addFlash('success', 'Loja atualizada com sucesso.');

                    return $this->redirectToRoute('home');
                } catch (\Exception $e) {
                    $this->addFlash('error', $e->getMessage());
                }
            }

        }

        return $this->render('admin/business/crud.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id"="\d+"}, name="app_business_remove")
     * @Method("DELETE")
     *
     * @param Request $request
     * @param Listing $business
     * @return RedirectResponse
     */
    public function removeAction(Request $request, Listing $business)
    {
        $token = $request->get('_token');

        if (!$this->isCsrfTokenValid('business_remove', $token)) {
            $this->addFlash('error', 'Token inválido, tente reenviar o formulário.');

            return $this->redirectToRoute('home');
        }

        try {
            $em = $this->getDoctrine()->getManager();
            $em->remove($business);
            $em->flush();

        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());

            return $this->redirectToRoute('home');
        }

        $this->addFlash('success', 'Removido com sucesso.');

        return $this->redirectToRoute('home');
    }

}
