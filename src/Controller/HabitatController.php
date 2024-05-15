<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HabitatController extends AbstractController
{
  #[Route('/habitat')]
  public function list() : Response
  {
	$habitats = ['habitat 1', 'habitat 2'];
	return $this->render('habitats/list.html.twig', [
    	  	'habitats' => $habitats,
	]);
  }

  #[Route('/voir')]
  public function show() : Response
  {
	return $this->render('habitats/show.html.twig', [
    	  	
	]);
  }
}

