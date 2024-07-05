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
use Symfony\Component\Mime\Address;
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

            $visitorEmail = $contact->getEmail();

            // Construction de l'email avec l'adresse email de l'expéditeur dynamique
            $email = (new Email())
                ->from(new Address('zoo.arcadia.studi@gmail.com')) // Set a static from address
                ->to('zoo.arcadia.studi@gmail.com')
                ->replyTo($visitorEmail) // Use visitor email as reply-to
                ->subject("Nouveau message de {$visitorEmail}")
                ->html("
                <html>
                <head>
                    <style>
                        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
                        body {
                        font-family: 'Roboto', sans-serif;
                        background: rgba(255, 255, 255, 0.2);
                        color: #fff;
                        }
                        .container {
                            width: 50%;
                            height:auto;
                            border-radius: 15px;
                            transition: transform 500ms ease-out;
                            overflow: hidden;
                            color: orange;
                            text-align: center;
                            background: rgba(255, 255, 255, 0.2);
                            border: 2px solid rgba(255, 255, 255, 0.1);
                            position: relative; 
                            border: solid 2px orange; 
                        }
                        h1{
                            text-decoration:underline;
                            margin-top:0;
                            color:#4caf50;
                        }
                        h2 {
                            color: Black;
                            
                        }
                        p {
                            margin-bottom: 10px;
                            color: black;
                        }
                        .button {
                            display: inline-block;
                            background-color: orange;
                            color: #fff;
                            padding: 10px 20px;
                            text-align: center;
                            text-decoration: none;
                            border-radius: 20px;
                            font-weight: bold;
                            margin-top: 20px;
                            margin-bottom: 20px;
                        }
                        .button:hover {
                            background-color: darkorange;
                        }
                </style>
                </head>
                <body>
                    <div class='container'>
                        <h2>Nouveau message de {$visitorEmail}</h2>
                        <p>{$contact->getMessage()}</p>
                        <a href='mailto:{$visitorEmail}' class='button'>Répondre à {$visitorEmail}</a>
                    </div>
                </body>
                </html>
                ");

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
