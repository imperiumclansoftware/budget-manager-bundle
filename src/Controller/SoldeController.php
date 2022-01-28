<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\Solde;
use App\Form\SoldeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/solde")
 */
class SoldeController extends AbstractController
{
    /**
     * @Route("/", name="solde_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $soldes = $entityManager
            ->getRepository(Solde::class)
            ->findAll();

        return $this->render('solde/index.html.twig', [
            'soldes' => $soldes,
        ]);
    }

    /**
     * @Route("/new", name="solde_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $solde = new Solde();
        $form = $this->createForm(SoldeType::class, $solde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($solde);
            $entityManager->flush();

            return $this->redirectToRoute('solde_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('solde/new.html.twig', [
            'solde' => $solde,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="solde_show", methods={"GET"})
     */
    public function show(Solde $solde): Response
    {
        return $this->render('solde/show.html.twig', [
            'solde' => $solde,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="solde_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Solde $solde, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SoldeType::class, $solde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('solde_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('solde/edit.html.twig', [
            'solde' => $solde,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="solde_delete", methods={"POST"})
     */
    public function delete(Request $request, Solde $solde, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$solde->getId(), $request->request->get('_token'))) {
            $entityManager->remove($solde);
            $entityManager->flush();
        }

        return $this->redirectToRoute('solde_index', [], Response::HTTP_SEE_OTHER);
    }
}
