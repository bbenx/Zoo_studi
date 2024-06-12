<?php

namespace App\Controller;

use App\Entity\Animaux;
use App\Repository\ComptesRendusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animaux/{id}', name: 'app_animal_show', methods: ['GET'])]
    public function show(Animaux $animal, ComptesRendusRepository $comptesRendusRepository): Response
    {
        $habitat = $animal->getHabitat();

        $comptesRendusVeto = $comptesRendusRepository->findBy(['Animal' => $animal], ['id' => 'DESC']);


        return $this->render('animal/animalDesc.html.twig', [
            'animal' => $animal,
            'habitat' => $habitat,
            'comptes_rendus_veto' => $comptesRendusVeto,
            'current_page' => 'animaux',
        ]);
    }
}
