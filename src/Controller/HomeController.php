<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use App\Repository\EtablissementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    public function home(
        Request $request,
        EntityManagerInterface $entityManager,
        AvisRepository $avisRepository,
        EtablissementRepository $etablissementRepository
    ): Response {
        $avis = new Avis();
        $etablissement = $etablissementRepository->find(2); // Assurez-vous que cet ID existe
        $avis->setEtablissement($etablissement); // Définir l'établissement par défaut dans l'entité
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);
        $formSubmitted = false;

        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setCreationDate(new \DateTimeImmutable());
            $avis->setModificationDate(new \DateTime());
            $avis->setStatut('en attente');
            $entityManager->persist($avis);
            $entityManager->flush();

            $this->addFlash('success', 'Votre avis a été soumis avec succès et est en attente de validation.');
            $formSubmitted = true;
        }

        $avisValides = $avisRepository->findBy(['statut' => 'validé'], ['creationDate' => 'DESC'], 4);

        return $this->render('home/home.html.twig', [
            'form' => $form->createView(),
            'formSubmitted' => $formSubmitted,
            'avisValidés' => $avisValides,
        ]);
    }
}
