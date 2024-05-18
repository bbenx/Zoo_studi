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

#[Route('admin')]
class HorairesController extends AbstractController
{
    #[Route('/horaires', name: 'app_horaires_index', methods: ['GET'])]
    public function index(HorairesRepository $horairesRepository): Response
    {
        return $this->render('horaires/index.html.twig', [
            'horaires' => $horairesRepository->findAll(),
        ]);
    }

    #[Route('/horaires/new', name: 'app_horaires_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $horaire = new Horaires();
        $horaire->setCreationDate(new \DateTimeImmutable());
        $horaire->setModificationDate(new \DateTime());

        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($horaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_horaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('horaires/new.html.twig', [
            'horaire' => $horaire,
            'form' => $form,
        ]);
    }

    #[Route('/horaires/{id}', name: 'app_horaires_show', methods: ['GET'])]
    public function show(Horaires $horaire): Response
    {
        return $this->render('horaires/show.html.twig', [
            'horaire' => $horaire,
        ]);
    }

    #[Route('/horaires/{id}/edit', name: 'app_horaires_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Horaires $horaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HorairesType::class, $horaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $horaire->setModificationDateValue();
            $entityManager->flush();

            return $this->redirectToRoute('app_horaires_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('horaires/edit.html.twig', [
            'horaire' => $horaire,
            'form' => $form,
        ]);
    }

    #[Route('/horaires/{id}', name: 'app_horaires_delete', methods: ['POST'])]
    public function delete(Request $request, Horaires $horaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $horaire->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($horaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_horaires_index', [], Response::HTTP_SEE_OTHER);
    }
}
