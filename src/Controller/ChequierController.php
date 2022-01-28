<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\Chequier;
use App\Form\ChequierType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chequier")
 */
class ChequierController extends AbstractController
{
    /**
     * @Route("/", name="chequier_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $chequiers = $entityManager
            ->getRepository(Chequier::class)
            ->findAll();

        return $this->render('chequier/index.html.twig', [
            'chequiers' => $chequiers,
        ]);
    }

    /**
     * @Route("/new", name="chequier_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $chequier = new Chequier();
        $form = $this->createForm(ChequierType::class, $chequier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($chequier);
            $entityManager->flush();

            return $this->redirectToRoute('chequier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chequier/new.html.twig', [
            'chequier' => $chequier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chequier_show", methods={"GET"})
     */
    public function show(Chequier $chequier): Response
    {
        return $this->render('chequier/show.html.twig', [
            'chequier' => $chequier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chequier_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Chequier $chequier, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ChequierType::class, $chequier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('chequier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chequier/edit.html.twig', [
            'chequier' => $chequier,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="chequier_delete", methods={"POST"})
     */
    public function delete(Request $request, Chequier $chequier, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chequier->getId(), $request->request->get('_token'))) {
            $entityManager->remove($chequier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chequier_index', [], Response::HTTP_SEE_OTHER);
    }
}
