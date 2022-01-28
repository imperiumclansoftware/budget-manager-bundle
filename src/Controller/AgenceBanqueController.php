<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\AgenceBanque;
use App\Form\AgenceBanqueType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/agence/banque")
 */
class AgenceBanqueController extends AbstractController
{
    /**
     * @Route("/", name="agence_banque_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $agenceBanques = $entityManager
            ->getRepository(AgenceBanque::class)
            ->findAll();

        return $this->render('agence_banque/index.html.twig', [
            'agence_banques' => $agenceBanques,
        ]);
    }

    /**
     * @Route("/new", name="agence_banque_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $agenceBanque = new AgenceBanque();
        $form = $this->createForm(AgenceBanqueType::class, $agenceBanque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($agenceBanque);
            $entityManager->flush();

            return $this->redirectToRoute('agence_banque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agence_banque/new.html.twig', [
            'agence_banque' => $agenceBanque,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="agence_banque_show", methods={"GET"})
     */
    public function show(AgenceBanque $agenceBanque): Response
    {
        return $this->render('agence_banque/show.html.twig', [
            'agence_banque' => $agenceBanque,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="agence_banque_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, AgenceBanque $agenceBanque, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AgenceBanqueType::class, $agenceBanque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('agence_banque_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agence_banque/edit.html.twig', [
            'agence_banque' => $agenceBanque,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="agence_banque_delete", methods={"POST"})
     */
    public function delete(Request $request, AgenceBanque $agenceBanque, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agenceBanque->getId(), $request->request->get('_token'))) {
            $entityManager->remove($agenceBanque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('agence_banque_index', [], Response::HTTP_SEE_OTHER);
    }
}
