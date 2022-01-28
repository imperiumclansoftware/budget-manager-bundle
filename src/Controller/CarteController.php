<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\Carte;
use App\Form\CarteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/carte")
 */
class CarteController extends AbstractController
{
    /**
     * @Route("/", name="carte_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $cartes = $entityManager
            ->getRepository(Carte::class)
            ->findAll();

        return $this->render('carte/index.html.twig', [
            'cartes' => $cartes,
        ]);
    }

    /**
     * @Route("/new", name="carte_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carte = new Carte();
        $form = $this->createForm(CarteType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carte);
            $entityManager->flush();

            return $this->redirectToRoute('carte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte/new.html.twig', [
            'carte' => $carte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="carte_show", methods={"GET"})
     */
    public function show(Carte $carte): Response
    {
        return $this->render('carte/show.html.twig', [
            'carte' => $carte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="carte_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Carte $carte, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarteType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('carte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte/edit.html.twig', [
            'carte' => $carte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="carte_delete", methods={"POST"})
     */
    public function delete(Request $request, Carte $carte, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carte->getId(), $request->request->get('_token'))) {
            $entityManager->remove($carte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('carte_index', [], Response::HTTP_SEE_OTHER);
    }
}
