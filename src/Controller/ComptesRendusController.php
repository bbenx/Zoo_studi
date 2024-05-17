<?php

namespace App\Controller;

use App\Entity\ComptesRendus;
use App\Form\ComptesRendusType;
use App\Repository\ComptesRendusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/comptes/rendus')]
class ComptesRendusController extends AbstractController
{
    #[Route('/', name: 'app_comptes_rendus_index', methods: ['GET'])]
    public function index(ComptesRendusRepository $comptesRendusRepository): Response
    {
        return $this->render('comptes_rendus/index.html.twig', [
            'comptes_renduses' => $comptesRendusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_comptes_rendus_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comptesRendu = new ComptesRendus();
        $comptesRendu->setCreationDate(new \DateTimeImmutable());
        $comptesRendu->setModificationDate(new \DateTime());
        $form = $this->createForm(ComptesRendusType::class, $comptesRendu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($comptesRendu);
            $entityManager->flush();

            return $this->redirectToRoute('app_comptes_rendus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes_rendus/new.html.twig', [
            'comptes_rendu' => $comptesRendu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comptes_rendus_show', methods: ['GET'])]
    public function show(ComptesRendus $comptesRendu): Response
    {
        return $this->render('comptes_rendus/show.html.twig', [
            'comptes_rendu' => $comptesRendu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_comptes_rendus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ComptesRendus $comptesRendu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ComptesRendusType::class, $comptesRendu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comptesRendu->setModificationDateValue();
            $entityManager->flush();

            return $this->redirectToRoute('app_comptes_rendus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes_rendus/edit.html.twig', [
            'comptes_rendu' => $comptesRendu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_comptes_rendus_delete', methods: ['POST'])]
    public function delete(Request $request, ComptesRendus $comptesRendu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $comptesRendu->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($comptesRendu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comptes_rendus_index', [], Response::HTTP_SEE_OTHER);
    }
}
