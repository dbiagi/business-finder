<?php

namespace AppBundle\Controller\PrivateController;

use AppBundle\Entity\Business;
use AppBundle\Form\BusinessType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CrudController
 *
 * @package AppBundle\Controller\PrivateController
 *
 * @Route("/business")
 */
class CrudController extends Controller {

    /**
     * @Route("/", name="app_admin")
     *
     * @return Response
     */
    public function indexAction() {
        return $this->redirectToRoute('app_home');
    }

    /**
     * @Route("/add", name="app_business_add")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request) {
        $form = $this->createForm(BusinessType::class, new Business());

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($form->getData());
                    $em->flush();

                    return $this->redirectToRoute('app_home');
                } catch (\Exception $e) {
                    $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                }
            }
        }

        return $this->render('admin/business/crud.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"}, name="app_business_edit")
     *
     * @param Request  $request
     * @param Business $business
     * @return Response
     */
    public function editAction(Request $request, Business $business) {
        $form = $this->createForm(BusinessType::class, $business);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($form->getData());
                    $em->flush();

                    return $this->redirectToRoute('app_home');
                } catch (\Exception $e) {
                    $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                }
            }
        }

        return $this->render('admin/business/crud.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
