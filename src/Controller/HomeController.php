<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use App\Repository\CommentairesHabitatsRepository;
use App\Repository\EspeceAnimauxRepository;
use App\Repository\EtablissementRepository;
use App\Repository\HabitatsRepository;
use App\Repository\ServicesRepository;
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
        EtablissementRepository $etablissementRepository,
        EspeceAnimauxRepository $especesAnimauxRepository,
        ServicesRepository $servicesRepository,
        HabitatsRepository $habitatsRepository
    ): Response {
        $especes = $especesAnimauxRepository->findAll();
        $services = $servicesRepository->findAll();
        $habitats = $habitatsRepository->findAll();
        $avis = new Avis();
        $etablissement = $etablissementRepository->find(2); // Assurez-vous que cet ID existe
        $avis->setEtablissement($etablissement); // Définir l'établissement par défaut dans l'entité
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setStatut('en attente');
            $entityManager->persist($avis);
            $entityManager->flush();

            $this->addFlash('success', 'Votre avis a été soumis avec succès et est en attente de validation.');
            setcookie (
                'avisForm',
                'success',
                time() + 60*60*24*365,
                '/',
            );
            return $this->redirectToRoute('home');
        }
        
        $avisForm = !empty($_COOKIE['avisForm']);

        $avisValides = $avisRepository->findBy(['statut' => 'validé'], ['creationDate' => 'DESC'], 4);

        $current_page = 'home';

        return $this->render('home/home.html.twig', [
            'form' => $form->createView(),
            'avisForm' => $avisForm,
            'avisValides' => $avisValides,
            'current_page' => $current_page,
            'especes' => $especes,
            'services' => $services,
            'habitats' => $habitats,
            'current_page' => "home",
        ]);
    }

    #[Route('/services', name: 'home_services', methods: ['GET'])]
    public function services(ServicesRepository $servicesRepository): Response
    {
        $services = $servicesRepository->findAll();
        return $this->render('home/services.html.twig', [
            'services' => $services,
            'current_page' => 'services',
        ]);
    }

}
