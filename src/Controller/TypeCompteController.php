<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\TypeCompte;
use App\Form\TypeCompteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/compte")
 */
class TypeCompteController extends AbstractController
{
    /**
     * @Route("/", name="type_compte_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $typeComptes = $entityManager
            ->getRepository(TypeCompte::class)
            ->findAll();

        return $this->render('type_compte/index.html.twig', [
            'type_comptes' => $typeComptes,
        ]);
    }

    /**
     * @Route("/new", name="type_compte_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeCompte = new TypeCompte();
        $form = $this->createForm(TypeCompteType::class, $typeCompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeCompte);
            $entityManager->flush();

            return $this->redirectToRoute('type_compte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_compte/new.html.twig', [
            'type_compte' => $typeCompte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_compte_show", methods={"GET"})
     */
    public function show(TypeCompte $typeCompte): Response
    {
        return $this->render('type_compte/show.html.twig', [
            'type_compte' => $typeCompte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_compte_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, TypeCompte $typeCompte, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeCompteType::class, $typeCompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('type_compte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_compte/edit.html.twig', [
            'type_compte' => $typeCompte,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="type_compte_delete", methods={"POST"})
     */
    public function delete(Request $request, TypeCompte $typeCompte, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeCompte->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeCompte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_compte_index', [], Response::HTTP_SEE_OTHER);
    }
}
