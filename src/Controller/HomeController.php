<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class HomeController extends AbstractController
{
  #[Route('/')]
  public function home(UsersRepository $usersRepository, UserPasswordHasherInterface $hasher): Response
  {
    // $users = $usersRepository->findAll();
    // foreach ($users as $user) {
    //   $usersRepository->upgradePassword($user, $hasher->hashPassword($user, 'Admin'));
    // }
    return $this->render('home/home.html.twig', [ // créer un fichier home/home.html.twig

    ]);
  }
}
