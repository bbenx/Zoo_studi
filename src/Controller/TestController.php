<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
}
