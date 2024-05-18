<?php

namespace App\Controller\Admin;

use App\Entity\Nourriture;
use App\Form\NourritureType;
use App\Repository\NourritureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('admin')]
class NourritureController extends AbstractController
{
    #[Route('/nourriture', name: 'app_nourriture_index', methods: ['GET'])]
    public function index(NourritureRepository $nourritureRepository): Response
    {
        return $this->render('nourriture/index.html.twig', [
            'nourritures' => $nourritureRepository->findAll(),
        ]);
    }

    #[Route('/nourriture/new', name: 'app_nourriture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nourriture = new Nourriture();
        $nourriture->setCreationDate(new \DateTimeImmutable());
        $nourriture->setModificationDate(new \DateTime());

        $form = $this->createForm(NourritureType::class, $nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nourriture);
            $entityManager->flush();

            return $this->redirectToRoute('app_nourriture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nourriture/new.html.twig', [
            'nourriture' => $nourriture,
            'form' => $form,
        ]);
    }

    #[Route('/nourriture/{id}', name: 'app_nourriture_show', methods: ['GET'])]
    public function show(Nourriture $nourriture): Response
    {
        return $this->render('nourriture/show.html.twig', [
            'nourriture' => $nourriture,
        ]);
    }

    #[Route('/nourriture/{id}/edit', name: 'app_nourriture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Nourriture $nourriture, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NourritureType::class, $nourriture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nourriture->setModificationDateValue();
            $entityManager->flush();

            return $this->redirectToRoute('app_nourriture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('nourriture/edit.html.twig', [
            'nourriture' => $nourriture,
            'form' => $form,
        ]);
    }

    #[Route('/nourriture/{id}', name: 'app_nourriture_delete', methods: ['POST'])]
    public function delete(Request $request, Nourriture $nourriture, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $nourriture->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($nourriture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nourriture_index', [], Response::HTTP_SEE_OTHER);
    }
}
