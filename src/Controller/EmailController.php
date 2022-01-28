<?php

namespace ICS\BudgetmanagerBundle\Controller;

use App\Entity\Email;
use App\Form\EmailType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/email")
 */
class EmailController extends AbstractController
{
    /**
     * @Route("/", name="email_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $emails = $entityManager
            ->getRepository(Email::class)
            ->findAll();

        return $this->render('email/index.html.twig', [
            'emails' => $emails,
        ]);
    }

    /**
     * @Route("/new", name="email_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $email = new Email();
        $form = $this->createForm(EmailType::class, $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($email);
            $entityManager->flush();

            return $this->redirectToRoute('email_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email/new.html.twig', [
            'email' => $email,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="email_show", methods={"GET"})
     */
    public function show(Email $email): Response
    {
        return $this->render('email/show.html.twig', [
            'email' => $email,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="email_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Email $email, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmailType::class, $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('email_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email/edit.html.twig', [
            'email' => $email,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="email_delete", methods={"POST"})
     */
    public function delete(Request $request, Email $email, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$email->getId(), $request->request->get('_token'))) {
            $entityManager->remove($email);
            $entityManager->flush();
        }

        return $this->redirectToRoute('email_index', [], Response::HTTP_SEE_OTHER);
    }
}
