<?php

namespace App\Controller\Admin;

use App\Document\AnimalClick;
use App\Entity\Animaux;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\RateLimiter\RateLimiterFactory;

#[Route('admin')]
class AnimalClickController extends AbstractController
{
    private $tokenManager;
    private $animalClickLimiter;

    public function __construct(CsrfTokenManagerInterface $tokenManager, RateLimiterFactory $animalClickLimiter)
    {
        $this->tokenManager = $tokenManager;
        $this->animalClickLimiter = $animalClickLimiter;
    }

    #[Route('/animal-click/{id}', name: 'animal_click', methods: ['POST'])]
    public function click(int $id, DocumentManager $dm, EntityManagerInterface $em, Request $request): Response
    {

        if ($this->getUser()) {
            // Si l'utilisateur est connecté, on ne fait rien
            return new Response('Click not recorded for connected users', 204);
        }

        $limiter = $this->animalClickLimiter->create($request->getClientIp());
        $limit = $limiter->consume();

        if (!$limit->isAccepted()) {
            return new JsonResponse(['error' => 'Too many requests'], 429);
        }
        error_log('Rate limiter passed.');
        $submittedToken = $request->request->get('_csrf_token');
        if (!$this->tokenManager->isTokenValid(new CsrfToken('click-animal', $submittedToken))) {
            return new Response('Invalid CSRF token', 403);
        }
        error_log('CSRF token validation passed.');

        $animal = $em->getRepository(Animaux::class)->find($id);
        if (!$animal) {
            return new Response('Animal not found', 404);
        }
        error_log('Animal not found.');
            $animalClick = new AnimalClick();
            $animalClick->setAnimalId($id);
            $animalClick->setPrenom($animal->getPrenom());

        // $animalClick->incrementClicks();
        $dm->persist($animalClick);
        $dm->flush();

        return new Response(sprintf('Number of clicks on animal %d:', $id,));
    }

    #[Route('/animal-clicks', name: 'admin_animal_clicks')]
    #[IsGranted('ROLE_ADMIN')] 
    public function index(DocumentManager $dm, EntityManagerInterface $em): Response
    {
        // Récupération de tous les clics d'animaux
        $animaux = $em->getRepository(Animaux::class)->findAll();
        $animalDetails = [];

        foreach ($animaux as $animal) {
            $animalClicks = $dm->getRepository(AnimalClick::class)->createQueryBuilder()
            ->field('animalId')->equals($animal->getId())
            ->count()
            ->getQuery()
            ->execute();
            $animalDetails [] = ['animal' => $animal, 'animalClicks' => $animalClicks];
        }
        
        return $this->render('animal_click/index.html.twig', [
            'animalDetails' => $animalDetails,
            'controller_name' => 'AnimalClickController',
        
        ]);
    }
}
