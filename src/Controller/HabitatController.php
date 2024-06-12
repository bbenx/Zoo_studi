<?php

namespace App\Controller;

use App\Document\AnimalClick;
use App\Entity\Habitats;
use App\Repository\AnimauxRepository;
use App\Repository\HabitatsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatController extends AbstractController
{
    #[Route('/habitats', name: 'home_habitats', methods: ['GET'])]
    public function habitats(HabitatsRepository $habitatsRepository): Response
    {
        $habitats = $habitatsRepository->findAll();
        return $this->render('home/habitats.html.twig', [
            'habitats' => $habitats,
            'current_page' => 'habitats',
        ]);
    }

    #[Route('/habitats/{id}', name: 'app_habitatss_show', methods: ['GET'])]
    public function show(Habitats $habitat, AnimauxRepository $animauxRepository): Response
    {
        return $this->render('home/habitats/habitatsDesc.html.twig', [
            'animaux' => $animauxRepository->findBy(['habitat' => $habitat]),
            'habitat' => $habitat,
            'current_page' => 'habitats',
        ]);
    }

    #[Route('/habitat/click/{id}', name: 'habitat_click')]
    public function click(int $id, EntityManagerInterface $em, DocumentManager $dm): RedirectResponse
    {
        $habitat = $em->getRepository(Habitats::class)->find($id);

        if (!$habitat) {
            throw $this->createNotFoundException('The habitat does not exist');
        }

        // Incrémenter les clics dans MongoDB
        $habitatClick = $dm->getRepository(AnimalClick::class)->findOneBy(['animalId' => $id]);

        if (!$habitatClick) {
            $habitatClick = new AnimalClick();
            $habitatClick->setAnimalId($id);
        }

        $habitatClick->incrementClicks();
        $dm->persist($habitatClick);
        $dm->flush();

        // Rediriger vers la page de détails de l'habitat
        return $this->redirectToRoute('app_habitatss_show', ['id' => $id]);
    }
}
