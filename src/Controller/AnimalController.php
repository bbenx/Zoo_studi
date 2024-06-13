<?php

namespace App\Controller;

use App\Document\AnimalClick;
use App\Entity\Animaux;
use App\Repository\ComptesRendusRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalController extends AbstractController
{
    #[Route('/animaux/{id}', name: 'app_animal_show', methods: ['GET'])]
    public function show(Animaux $animal, ComptesRendusRepository $comptesRendusRepository, DocumentManager $dm): Response
    {
        $habitat = $animal->getHabitat();
        $comptesRendusVeto = $comptesRendusRepository->findBy(['Animal' => $animal], ['id' => 'DESC']);

        $animalClick = $dm->getRepository(AnimalClick::class)->findOneBy(['animalId' => $animal->getId()]);

        if (!$animalClick) {
            $animalClick = new AnimalClick();
            $animalClick->setAnimalId($animal->getId());
        }

        $animalClick->incrementClicks();
        $dm->persist($animalClick);
        $dm->flush();

        return $this->render('animal/animalDesc.html.twig', [
            'animal' => $animal,
            'habitat' => $habitat,
            'comptes_rendus_veto' => $comptesRendusVeto,
            'current_page' => 'animaux',
        ]);
    }
}
