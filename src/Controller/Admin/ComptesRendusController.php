<?php

namespace App\Controller\Admin;

use App\Entity\ComptesRendus;
use App\Form\ComptesRendusType;
use App\Repository\ComptesRendusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
class ComptesRendusController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/comptes/rendus', name: 'app_comptes_rendus_index', methods: ['GET'])]
    #[IsGranted(new Expression('is_granted("ROLE_VETERINAIRE") or is_granted("ROLE_ADMIN")'))]
    public function index(ComptesRendusRepository $comptesRendusRepository): Response
    {
        return $this->render('comptes_rendus/index.html.twig', [
            'comptes_rendus' => $comptesRendusRepository->findAll(),
        ]);
    }

    #[Route('/comptes/rendus/new', name: 'app_comptes_rendus_new', methods: ['GET', 'POST'])]
    #[IsGranted ('ROLE_VETERINAIRE')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $comptesRendu = new ComptesRendus();
        $user = $this->security->getUser();
        $comptesRendu->setUser($user);
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

    #[Route('/comptes/rendus/{id}', name: 'app_comptes_rendus_show', methods: ['GET'])]
    public function show(ComptesRendus $comptesRendu): Response
    {
        return $this->render('comptes_rendus/show.html.twig', [
            'comptes_rendu' => $comptesRendu,
        ]);
    }

    #[Route('/comptes/rendus/{id}/edit', name: 'app_comptes_rendus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ComptesRendus $comptesRendu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ComptesRendusType::class, $comptesRendu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $comptesRendu->setModificationDate(new \DateTime());
            $entityManager->flush();

            return $this->redirectToRoute('app_comptes_rendus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('comptes_rendus/edit.html.twig', [
            'comptes_rendu' => $comptesRendu,
            'form' => $form,
        ]);
    }

    #[Route('/comptes/rendus/{id}', name: 'app_comptes_rendus_delete', methods: ['POST'])]
    public function delete(Request $request, ComptesRendus $comptesRendu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $comptesRendu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($comptesRendu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_comptes_rendus_index', [], Response::HTTP_SEE_OTHER);
    }
}
