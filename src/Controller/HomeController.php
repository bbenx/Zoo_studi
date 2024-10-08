<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Entity\Etablissement;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use App\Repository\EspeceAnimauxRepository;
use App\Repository\HabitatsRepository;
use App\Repository\HorairesRepository;
use App\Repository\ServicesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    public function home(
        Request $request,
        EntityManagerInterface $entityManager,
        AvisRepository $avisRepository,
        EspeceAnimauxRepository $especesAnimauxRepository,
        ServicesRepository $servicesRepository,
        HabitatsRepository $habitatsRepository,
        HorairesRepository $horairesRepository,
    ): Response {
        $especes = $especesAnimauxRepository->findAll();
        $services = $servicesRepository->findAll();
        $horaires = $horairesRepository->findAll();
        $habitats = $habitatsRepository->findAll();
        $avis = new Avis();
        $etablissement = $entityManager->getRepository(Etablissement::class)->findOneBy(['nom' => 'Zoo Arcadia']);
        $avis->setEtablissement($etablissement);
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

        $avisValides = $avisRepository->findBy(['statut' => 'validé'], ['creationDate' => 'DESC'], 5);

        $current_page = 'home';

        return $this->render('home/home.html.twig', [
            'form' => $form->createView(),
            'avisForm' => $avisForm,
            'avisValides' => $avisValides,
            'current_page' => $current_page,
            'especes' => $especes,
            'services' => $services,
            'habitats' => $habitats,
            'horaires' => $horaires,
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

    #[Route('/avis/ajouter', name:'app_avis_ajouter', methods:['POST'])]
    public function ajouterAvis (Request $request, EntityManagerInterface $entityManager) : JsonResponse 
    {
        $avis = new Avis ();

        $etablissement = $entityManager->getRepository(Etablissement::class)->findOneBy(['nom' => 'Zoo Arcadia']);
        if ($etablissement) {
            $avis->setEtablissement($etablissement);
        } else {
            return new JsonResponse(['success' => false, 'message' => 'Etablissement non trouvé'], 400);
        }

        $form = $this->createForm(AvisType::class, $avis);
        $form -> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $avis->setStatut('en attente');
            $entityManager->persist($avis);
            $entityManager->flush();
            

            return new JsonResponse(['success' =>true]);
        }
        return new JsonResponse(['success' => false], 400);
    }

    #[Route('/mentionslegales_cgu', name: 'home_mentions_legales_cgu', methods: ['GET'])]
    public function mentionsLegales(): Response
    {
        return $this->render('home/mentions_legales_cgu.html.twig', [
            'current_page' => 'mentions_legales_cgu',
        ]);
    }
    #[Route('/confidentialite', name: 'home_confidentialite', methods: ['GET'])]
    public function confidentialite(): Response
    {
        return $this->render('home/confidentialite.html.twig', [
            'current_page' => 'confidentialite',
        ]);
    }

}
