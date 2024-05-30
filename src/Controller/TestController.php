<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(): Response
    {
        $date = new \DateTime();

        return new Response(
            '<html><body>Current date and time: ' . $date->format('Y-m-d H:i:s') . '</body></html>'
        );
    }

    #[Route('/test/email', name: 'app_test_email')]
    public function testEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('zooarcadia@gmail.com')
            ->to('test@example.com')
            ->subject('Test Email')
            ->text('This is a test email.');

        try {
            $mailer->send($email);
            return new Response('Email sent successfully');
        } catch (\Exception $e) {
            return new Response('Failed to send email: ' . $e->getMessage());
        }
    }

}

