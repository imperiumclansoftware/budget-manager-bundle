<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\SousCategorie;
use App\Form\SousCategorieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sous/categorie")
 */
class SousCategorieController extends AbstractController
{
    /**
     * @Route("/", name="sous_categorie_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $sousCategories = $entityManager
            ->getRepository(SousCategorie::class)
            ->findAll();

        return $this->render('sous_categorie/index.html.twig', [
            'sous_categories' => $sousCategories,
        ]);
    }

    /**
     * @Route("/new", name="sous_categorie_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sousCategorie = new SousCategorie();
        $form = $this->createForm(SousCategorieType::class, $sousCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($sousCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('sous_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_categorie/new.html.twig', [
            'sous_categorie' => $sousCategorie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sous_categorie_show", methods={"GET"})
     */
    public function show(SousCategorie $sousCategorie): Response
    {
        return $this->render('sous_categorie/show.html.twig', [
            'sous_categorie' => $sousCategorie,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sous_categorie_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SousCategorie $sousCategorie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SousCategorieType::class, $sousCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('sous_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_categorie/edit.html.twig', [
            'sous_categorie' => $sousCategorie,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="sous_categorie_delete", methods={"POST"})
     */
    public function delete(Request $request, SousCategorie $sousCategorie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sousCategorie->getId(), $request->request->get('_token'))) {
            $entityManager->remove($sousCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sous_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
