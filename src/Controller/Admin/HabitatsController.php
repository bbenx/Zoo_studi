<?php

namespace App\Controller\Admin;

use App\Entity\CommentairesHabitats;
use App\Entity\Habitats;
use App\Form\HabitatsType;
use App\Repository\CommentairesHabitatsRepository;
use App\Repository\HabitatsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('admin')]
#[IsGranted('ROLE_ADMIN')]
class HabitatsController extends AbstractController
{
    #[Route('/habitats', name: 'app_habitats_index', methods: ['GET'])]
    public function index(HabitatsRepository $habitatsRepository): Response
    {
        return $this->render('habitats/index.html.twig', [
            'habitats' => $habitatsRepository->findAll(),
        ]);
    }

    #[Route('/habitats/new', name: 'app_habitats_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $habitat = new Habitats();

        $form = $this->createForm(HabitatsType::class, $habitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($habitat);
            $entityManager->flush();

            $this->addFlash('success', 'Habitat ajouté avec succès.');


            return $this->redirectToRoute('app_habitats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('habitats/new.html.twig', [
            'habitat' => $habitat,
            'form' => $form,
        ]);
    }

    #[Route('/habitats/{id}', name: 'app_habitats_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function show(Habitats $habitat, CommentairesHabitatsRepository $commentairesHabitatsRepository): Response
    {
        $commentaires = $commentairesHabitatsRepository->findBy(['habitat' => $habitat]);
        return $this->render('habitats/show.html.twig', [
            'habitat' => $habitat,
            'commentaires' => $commentaires,
        ]);
    }

    #[Route('/habitats/{id}/edit', name: 'app_habitats_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Habitats $habitat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HabitatsType::class, $habitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Habitat modifié avec succès.');


            return $this->redirectToRoute('app_habitats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('habitats/edit.html.twig', [
            'habitat' => $habitat,
            'form' => $form,
        ]);
    }

    #[Route('/habitats/{id}', name: 'app_habitats_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Habitats $habitat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $habitat->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($habitat);
            $entityManager->flush();

            $this->addFlash('success', 'Habitat supprimé avec succès.');

        }

        return $this->redirectToRoute('app_habitats_index', [], Response::HTTP_SEE_OTHER);
    }
}
