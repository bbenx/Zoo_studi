<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'home_contact')]
    public function index(Request $request, EntityManagerInterface $manager, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();

            // Envoi d'email
            $email = (new Email())
                ->from('zoo_arcadia@gmail.com')
                ->to('you@exemple.com')
                ->subject('Nouveau message de contact')
                ->text('Vous avez reçu un nouveau message de contact')
                ->html('<p>Vous avez reçu un nouveau message de contact</p>');

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé ! 🙂');
            return $this->redirectToRoute('home_contact');
        }

        return $this->render('home/contact/index.html.twig', [
            'form' => $form->createView(),
            'current_page' => 'contact',
        ]);
    }
}
