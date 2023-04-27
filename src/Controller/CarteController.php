<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function carte(): Response
    {
        return $this->render('carte/carte.html.twig', [
            'controller_name' => 'CarteController',
        ]);
    }
}
