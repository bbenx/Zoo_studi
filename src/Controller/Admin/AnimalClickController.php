<?php

namespace App\Controller\Admin;

use App\Document\AnimalClick;
use App\Entity\Animaux;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;

#[Route('admin')]
#[IsGranted('ROLE_ADMIN')]
class AnimalClickController extends AbstractController
{
    private $tokenManager;

    public function __construct(CsrfTokenManagerInterface $tokenManager)
    {
        $this->tokenManager = $tokenManager;
    }

    #[Route('/animal-click/{id}', name: 'animal_click')]
    public function click(int $id, DocumentManager $dm, EntityManagerInterface $em, Request $request): Response
    {
        $submittedToken = $request->query->get('_token');

        if (!$this->tokenManager->isTokenValid(new CsrfToken('click-animal', $submittedToken))) {
            return new Response('Invalid CSRF token', 403);
        }

        $animal = $em->getRepository(Animaux::class)->find($id);

        if (!$animal) {
            return new Response('Animal not found', 404);
        }

        $animalClick = $dm->getRepository(AnimalClick::class)->findOneBy(['animalId' => $id]);

        if (!$animalClick) {
            $animalClick = new AnimalClick();
            $animalClick->setAnimalId($id);
        }

        $animalClick->incrementClicks();
        $dm->persist($animalClick);
        $dm->flush();

        return new Response(sprintf('Number of clicks on animal %d: %d', $id, $animalClick->getClicks()));
    }

    #[Route('/animal-clicks', name: 'admin_animal_clicks')]
    public function index(DocumentManager $dm, EntityManagerInterface $em): Response
    {
        $clicks = $dm->getRepository(AnimalClick::class)->findAll();
        $animalDetails = [];

        foreach ($clicks as $click) {
            $animal = $em->getRepository(Animaux::class)->find($click->getAnimalId());
            if ($animal) {
                $animalDetails[] = [
                    'id' => $animal->getId(),
                    'prenom' => $animal->getPrenom(),
                    'clicks' => $click->getClicks(),
                ];
            }
        }

        return $this->render('animal_click/index.html.twig', [
            'animalDetails' => $animalDetails,
            'controller_name' => 'AnimalClickController',
        ]);
    }
}
