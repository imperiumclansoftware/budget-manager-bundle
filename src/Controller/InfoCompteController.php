<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\InfoCompte;
use App\Form\InfoCompteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/info/compte")
 */
class InfoCompteController extends AbstractController
{
    /**
     * @Route("/", name="info_compte_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $infoComptes = $entityManager
            ->getRepository(InfoCompte::class)
            ->findAll();

        return $this->render('info_compte/index.html.twig', [
            'info_comptes' => $infoComptes,
        ]);
    }

    /**
     * @Route("/new", name="info_compte_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $infoCompte = new InfoCompte();
        $form = $this->createForm(InfoCompteType::class, $infoCompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($infoCompte);
            $entityManager->flush();

            return $this->redirectToRoute('info_compte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('info_compte/new.html.twig', [
            'info_compte' => $infoCompte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="info_compte_show", methods={"GET"})
     */
    public function show(InfoCompte $infoCompte): Response
    {
        return $this->render('info_compte/show.html.twig', [
            'info_compte' => $infoCompte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="info_compte_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, InfoCompte $infoCompte, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(InfoCompteType::class, $infoCompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('info_compte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('info_compte/edit.html.twig', [
            'info_compte' => $infoCompte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="info_compte_delete", methods={"POST"})
     */
    public function delete(Request $request, InfoCompte $infoCompte, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infoCompte->getId(), $request->request->get('_token'))) {
            $entityManager->remove($infoCompte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_compte_index', [], Response::HTTP_SEE_OTHER);
    }
}
