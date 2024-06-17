<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;



#[Route('/admin')]
class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_users_index', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function index(UsersRepository $usersRepository): Response
    {
        return $this->render('users/index.html.twig', [
            'users' => $usersRepository->findAll(),
        ]);
    }

    #[Route('/users/new', name: 'app_users_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function new(MailerInterface $mailer, Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $hasher): Response
    {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
    
            if ($plainPassword === null) {
                $this->addFlash('error', 'Le mot de passe ne peut pas être nul.');
                return $this->redirectToRoute('app_users_new');
            }
            $user->setPassword(
            $hasher->hashPassword(
                $user,
                $plainPassword
                )
            );

            $user->setPlainPassword(null);

            $roles = $form->get('roles')->getData();
            if (!in_array('ROLE_USER', $roles)) {
                $roles[] = 'ROLE_USER';
            }
            $user->setRoles($roles);

            $entityManager->persist($user);
            $entityManager->flush();
    
            $email = (new Email())
            ->from('zoo.arcadia.studi@gmail.com')
            ->to($user->getEmail())
            ->subject('Bienvenue !!')
            ->html("
                <html>
                <body style='font-family: Arial, sans-serif;'>
                    <h1 style='color: #4caf50;'>Bienvenue au Zoo Arcadia !</h1>
                    <p>Votre compte a bien été créé. Pour vous connecter, cliquez sur le lien ci-dessous :</p>
                    <p><a href='http://127.0.0.1:8000/login' style='padding: 10px 20px; background-color: orange; color: #fff; text-decoration: none; border-radius: 5px;'>Se connecter</a></p>
                    <p>Rapprochez-vous de votre responsable pour obtenir votre mot de passe.</p>
                    <p>Merci et à très vite !!</p>
                </body>
                </html>
            ");
            
            $mailer->send($email);

            $this->addFlash('success', 'Utilisateur ajouté avec succès.');

            return $this->redirectToRoute('app_users_index', [], Response::HTTP_SEE_OTHER);

        }
    
        return $this->render('users/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
    

    #[Route('/users/{id}', name: 'app_users_show', methods: ['GET'])]
    #[IsGranted('ROLE_ADMIN')]
    public function show(Users $user): Response
    {
        return $this->render('users/show.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/users/{id}/edit', name: 'app_users_edit', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function edit(Request $request, Users $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Utilisateur modifié avec succès.');


            return $this->redirectToRoute('app_users_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('users/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/users/{id}', name: 'app_users_delete', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function delete(Request $request, Users $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();

            $this->addFlash('success', 'Utilisateur supprimé avec succès.');

        }

        return $this->redirectToRoute('app_users_index', [], Response::HTTP_SEE_OTHER);
    }
}
