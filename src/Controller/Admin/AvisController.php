<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('admin')]
class AvisController extends AbstractController
{
    #[Route('/avis', name: 'app_avis_index', methods: ['GET'])]
    #[IsGranted("ROLE_EMPLOYE")]
    public function index(AvisRepository $avisRepository): Response
    {
        $avisAValider = $avisRepository->findBy(['statut' => 'en attente']);
        $avisValides = $avisRepository->findBy(['valide' => true]);

        return $this->render('avis/index.html.twig', [
            'avisAValider' => $avisAValider,
            'avisValides' => $avisValides,
        ]);
    }

    #[Route('/avis/{id}', name: 'app_avis_show', methods: ['GET'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function show(Avis $avi): Response
    {
        return $this->render('avis/show.html.twig', [
            'avi' => $avi,
        ]);
    }

    #[Route('/avis/{id}/edit', name: 'app_avis_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function edit(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_avis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('avis/edit.html.twig', [
            'avi' => $avi,
            'form' => $form,
        ]);
    }

    #[Route('/avis/{id}', name: 'app_avis_delete', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function delete(Request $request, Avis $avi, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $avi->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($avi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_avis_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/avis/{id}/valider', name: 'app_avis_valider', methods: ['POST'])]
    #[IsGranted('ROLE_EMPLOYE')]
    public function valider(Request $request, Avis $avis, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('valider' . $avis->getId(), $request->request->get('_token'))) {
            $avis->setStatut("validé");
            $avis->setValide(true);
            $entityManager->persist($avis);
            $entityManager->flush();

            $this->addFlash('success', 'Avis validé avec succès');
        }else {
            $this->addFlash('error', 'Erreur lors de la validation de l\avis');
        }

        return $this->redirectToRoute('app_avis_index', [], Response::HTTP_SEE_OTHER);
    }
}
