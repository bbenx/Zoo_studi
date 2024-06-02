<?php

namespace App\Controller\Admin;

use App\Entity\CommentairesHabitats;
use App\Form\CommentairesHabitatsType;
use App\Repository\CommentairesHabitatsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('admin')]
class CommentairesHabitatsController extends AbstractController
{
    #[Route('/commentaires/habitats', name: 'app_commentaires_habitats_index', methods: ['GET'])]
    #[IsGranted(new Expression('is_granted("ROLE_VETERINAIRE") or is_granted("ROLE_ADMIN")'))]
    public function index(CommentairesHabitatsRepository $commentairesHabitatsRepository): Response
    {
        return $this->render('commentaires_habitats/index.html.twig', [
            'commentaires_habitats' => $commentairesHabitatsRepository->findAll(),
        ]);
    }

    #[Route('/commentaires/habitats/new', name: 'app_commentaires_habitats_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_VETERINAIRE')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $commentairesHabitat = new CommentairesHabitats();
        $commentairesHabitat->setUser($this->getUser());

        $form = $this->createForm(CommentairesHabitatsType::class, $commentairesHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($commentairesHabitat);
            $entityManager->flush();

            $this->addFlash('success', 'Commentaire ajouté avec succès.');


            return $this->redirectToRoute('app_commentaires_habitats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaires_habitats/new.html.twig', [
            'commentaires_habitat' => $commentairesHabitat,
            'form' => $form,
        ]);
    }

    #[Route('/commentaires/habitats/{id}', name: 'app_commentaires_habitats_show', methods: ['GET'])]
    #[IsGranted(new Expression('is_granted("ROLE_VETERINAIRE") or is_granted("ROLE_ADMIN")'))]
    public function show(CommentairesHabitats $commentairesHabitat): Response
    {
        return $this->render('commentaires_habitats/show.html.twig', [
            'commentaires_habitat' => $commentairesHabitat,
        ]);
    }

    #[Route('/commentaires/habitats/{id}/edit', name: 'app_commentaires_habitats_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_VETERINAIRE')]
    public function edit(Request $request, CommentairesHabitats $commentairesHabitat, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CommentairesHabitatsType::class, $commentairesHabitat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Commentaire modifié avec succès.');


            return $this->redirectToRoute('app_commentaires_habitats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('commentaires_habitats/edit.html.twig', [
            'commentaires_habitat' => $commentairesHabitat,
            'form' => $form,
        ]);
    }

    #[Route('/commentaires/habitats/{id}', name: 'app_commentaires_habitats_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, CommentairesHabitats $commentairesHabitat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $commentairesHabitat->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($commentairesHabitat);
            $entityManager->flush();

            $this->addFlash('success', 'commentaire supprimé avec succès.');

        }

        return $this->redirectToRoute('app_commentaires_habitats_index', [], Response::HTTP_SEE_OTHER);
    }
}
