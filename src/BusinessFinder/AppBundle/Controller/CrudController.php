<?php

namespace BusinessFinder\AppBundle\Controller;

use BusinessFinder\AppBundle\Event\EntityEventArgs;
use BusinessFinder\AppBundle\Event\EntityEvents;
use BusinessFinder\ListingBundle\Entity\Listing;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CrudController
 */
class CrudController extends Controller
{
    /**
     * @Route("/{item}/add", name="new_item")
     * @param Request $request
     * @param string $item
     * @return Response
     */
    public function newAction(Request $request, $item)
    {
        $dispatcher = $this->get('event_dispatcher');

        $eventArgs = new EntityEventArgs();

        $dispatcher->dispatch(sprintf(EntityEvents::NEW_ITEM, $item), $eventArgs);

        $entityClass = $eventArgs->getEntityClass();

        $form = $this->createForm($eventArgs->getFormTypeClass(), new $entityClass);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($form->getData());
                    $em->flush();

                    $this->addFlash('success', $eventArgs->getSucessFlashMessage());

                    return $this->redirectToRoute('home');
                } catch (\Exception $e) {
                    $this->addFlash('error', $e->getMessage());
                }
            } else {
                $this->addFlash('error', 'Foram encontrado alguns dados inválidos no formulário.');
            }
        }

        return $this->render('pages/item/default_crud.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{item}/{id}/edit", requirements={"id"="\d+"}, name="edit_item")
     *
     * @param Request $request
     * @param string $item
     * @param int $id
     * @return Response
     */
    public function editAction(Request $request, $item, $id)
    {
        $eventArgs = new EntityEventArgs();
        $this->get('event_dispatcher')->dispatch(sprintf(EntityEvents::EDIT_ITEM, $item), $eventArgs);

        $entity = $this->get('doctrine.orm.default_entity_manager')
            ->getRepository($eventArgs->getEntityClass())
            ->find($id);

        $form = $this->createForm($eventArgs->getFormTypeClass(), $entity);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                try {
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($form->getData());
                    $em->flush();

                    $this->addFlash('success', $eventArgs->getSucessFlashMessage());

                    return $this->redirectToRoute('home');
                } catch (\Exception $e) {
                    $this->addFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('pages/item/default_crud.html.twig', [
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
