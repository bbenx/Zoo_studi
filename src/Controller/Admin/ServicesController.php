<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use App\Form\ServicesType;
use App\Repository\ServicesRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services_index', methods: ['GET'])]
    #[IsGranted(new Expression('is_granted("ROLE_EMPLOYE") or is_granted("ROLE_ADMIN")'))]

    public function index(ServicesRepository $servicesRepository): Response
    {
        return $this->render('services/index.html.twig', [
            'services' => $servicesRepository->findAll(),
        ]);
    }

    #[Route('/services/new', name: 'app_services_new', methods: ['GET', 'POST'])]
    #[IsGranted(new Expression('is_granted("ROLE_EMPLOYE") or is_granted("ROLE_ADMIN")'))]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $service = new Services();
        $form = $this->createForm(ServicesType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($service);
            $entityManager->flush();

            $this->addFlash('success', 'Service ajouté avec succès.');


            return $this->redirectToRoute('app_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('services/new.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    #[Route('/services/{id}', name: 'app_services_show', methods: ['GET'])]
    #[IsGranted(new Expression('is_granted("ROLE_EMPLOYE") or is_granted("ROLE_ADMIN")'))]
    public function show(Services $service): Response
    {
        return $this->render('services/show.html.twig', [
            'service' => $service,
        ]);
    }

    #[Route('/services/{id}/edit', name: 'app_services_edit', methods: ['GET', 'POST'])]
    #[IsGranted(new Expression('is_granted("ROLE_EMPLOYE") or is_granted("ROLE_ADMIN")'))]
    public function edit(Request $request, Services $service, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServicesType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Service modifié avec succès.');


            return $this->redirectToRoute('app_services_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('services/edit.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    #[Route('/services/{id}', name: 'app_services_delete', methods: ['POST'])]
    #[IsGranted(new Expression('is_granted("ROLE_EMPLOYE") or is_granted("ROLE_ADMIN")'))]
    public function delete(Request $request, Services $service, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $service->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($service);
            $entityManager->flush();

            $this->addFlash('success', 'Service supprimé avec succès.');

        }

        return $this->redirectToRoute('app_services_index', [], Response::HTTP_SEE_OTHER);
    }
}
