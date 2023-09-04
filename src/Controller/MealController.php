<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MealController extends AbstractController
{
    #[Route('/meal', name: 'app_meal')]
    public function index(): Response
    {
        return $this->render('meal/index.html.twig', [
            'controller_name' => 'MealController',
        ]);
    }
    #[Route('/meal/new')]
    public function create(Request $request): Response
    {
        $meal = new Meal();
        $form = $this->createForm(MealType::class, $meal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
dump($meal);
        }
        return $this->render('meal/index.html.twig', [
        "meal_form"=>$meal->createView()
    ]);
        }
}
