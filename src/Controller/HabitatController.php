<?php

namespace App\Controller;

use App\Entity\Habitats;
use App\Repository\AnimauxRepository;
use App\Repository\HabitatsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

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
        return $this->render('home/habitats/habitatss.html.twig', [
            'animaux' => $animauxRepository->findBy(['habitat' =>$habitat]),
            'habitat' => $habitat,
            'current_page' => 'habitats',
        ]);
    }
}
