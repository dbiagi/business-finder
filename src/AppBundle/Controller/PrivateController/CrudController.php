<?php

namespace AppBundle\Controller\PrivateController;

use AppBundle\Entity\Business;
use AppBundle\Form\BusinessType;
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
        return $this->redirectToRoute('app_home');
    }

    /**
     * @Route("/add", name="app_business_add")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        $business = new Business();
        $form = $this->createForm(BusinessType::class, $business);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ($form->isValid()) {
                try {

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($business);
                    $em->flush();

                    $this->get('app.elastica.connection')->addDocument('business', $business);

                    $request->getSession()->getFlashBag()->add('success', 'Loja criada com sucesso.');

                    return $this->redirectToRoute('app_home');
                } catch (\Exception $e) {
                    $request->getSession()->getFlashBag()->add('error', $e->getMessage());
                }
            } else {
                $request->getSession()->getFlashBag()->add('error',
                    'Foram encontrado alguns dados inválidos no formulário.');
            }
        }

        return $this->render('admin/business/crud.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", requirements={"id"="\d+"}, name="app_business_edit")
     *
     * @param Request $request
     * @param Business $business
     * @return Response
     */
    public function editAction(Request $request, Business $business)
    {
        $form = $this->createForm(BusinessType::class, $business);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($business);
                    $em->flush();

                    $this->get('app.elastica.connection')->addDocument('business', $business);

                    $request->getSession()->getFlashBag()->add('success', 'Loja atualizada com sucesso.');

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
     * @Route("/{id}", requirements={"id"="\d+"}, name="app_business_remove")
     * @Method("DELETE")
     *
     * @param Request $request
     * @param Business $business
     * @return RedirectResponse
     */
    public function removeAction(Request $request, Business $business)
    {
        $token = $request->get('_token');

        if (!$this->isCsrfTokenValid('business_remove', $token)) {
            $request->getSession()->getFlashBag()->add('error', 'Token inválido, tente reenviar o formulário.');

            return $this->redirectToRoute('app_home');
        }

        try {
            $this->get('app.elastica.connection')->deleteDocument('business', $business);
            $em = $this->getDoctrine()->getManager();
            $em->remove($business);
            $em->flush();

        } catch (\Exception $e) {
            $request->getSession()->getFlashBag()->add('error', $e->getMessage());

            return $this->redirectToRoute('app_home');
        }

        $request->getSession()->getFlashBag()->add('success', 'Removido com sucesso.');

        return $this->redirectToRoute('app_home');
    }

}
