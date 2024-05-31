<?php

namespace App\Controller\Admin;

use App\Entity\Horaires;
use App\Form\HorairesType;
use App\Repository\HorairesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('admin')]
class HorairesController extends AbstractController
{
    #[Route('/horaires', name: 'app_horaires_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(HorairesRepository $horairesRepository): Response
    {
        return $this->render('horaires/index.html.twig', [
            'horaires' => $horairesRepository->findAll(),
        ]);
    }

    #[Route('/horaires/new', name: 'app_horaires_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $horaire = new Horaires();

        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($horaire);
            $entityManager->flush();

            $this->addFlash('success', 'Horaires ajoutés avec succès.');


            return $this->redirectToRoute('app_horaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('horaires/new.html.twig', [
            'horaire' => $horaire,
            'form' => $form,
        ]);
    }

    #[Route('/horaires/{id}', name: 'app_horaires_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function show(Horaires $horaire): Response
    {
        return $this->render('horaires/show.html.twig', [
            'horaire' => $horaire,
        ]);
    }

    #[Route('/horaires/{id}/edit', name: 'app_horaires_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Horaires $horaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Horaires modifiés avec succès.');


            return $this->redirectToRoute('app_horaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('horaires/edit.html.twig', [
            'horaire' => $horaire,
            'form' => $form,
        ]);
    }

    #[Route('/horaires/{id}', name: 'app_horaires_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Horaires $horaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $horaire->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($horaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_horaires_index', [], Response::HTTP_SEE_OTHER);
    }
}
