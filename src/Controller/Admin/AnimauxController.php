<?php

namespace App\Controller\Admin;

use App\Entity\Animaux;
use App\Form\AnimauxType;
use App\Repository\AnimauxRepository;
use App\Repository\ComptesRendusRepository;
use App\Repository\NourritureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('admin')]
#[IsGranted(new Expression('is_granted("ROLE_ADMIN") or is_granted("ROLE_VETERINAIRE")'))]
class AnimauxController extends AbstractController
{
    #[Route('/animaux', name: 'app_animaux_index', methods: ['GET'])]
    public function index(AnimauxRepository $animauxRepository): Response
    {
        return $this->render('animaux/index.html.twig', [
            'animaux' => $animauxRepository->findAll(),
        ]);
    }

    #[Route('/animaux/new', name: 'app_animaux_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $animaux = new Animaux();
        $animaux->setCreationDate(new \DateTimeImmutable());
        $animaux->setModificationDate(new \DateTime());
        $form = $this->createForm(AnimauxType::class, $animaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($animaux);
            $entityManager->flush();

            return $this->redirectToRoute('app_animaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animaux/new.html.twig', [
            'animaux' => $animaux,
            'form' => $form,
        ]);
    }

    #[Route('/animaux/{id}', name: 'app_animaux_show', methods: ['GET'])]
    public function show(Animaux $animaux, ComptesRendusRepository $comptesRendusRepository, NourritureRepository $nourritureRepository): Response
    {
        $comptesRendus = $comptesRendusRepository->findBy(['Animal' => $animaux], ['creationDate' => 'DESC']);
        $nourriture = $nourritureRepository->findBy(['Animal' => $animaux], ['dateCreation' => 'DESC']);
        return $this->render('animaux/show.html.twig', [
            'animaux' => $animaux,
            'comptes_rendus' => $comptesRendus,
            'nourritures' => $nourriture,
        ]);
    }

    #[Route('/animaux/{id}/edit', name: 'app_animaux_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Animaux $animaux, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnimauxType::class, $animaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $animaux->setModificationDateValue();
            $entityManager->flush();

            return $this->redirectToRoute('app_animaux_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animaux/edit.html.twig', [
            'animaux' => $animaux,
            'form' => $form,
        ]);
    }

    #[Route('/animaux/{id}', name: 'app_animaux_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Animaux $animaux, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $animaux->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($animaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_animaux_index', [], Response::HTTP_SEE_OTHER);
    }
}
