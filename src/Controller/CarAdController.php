<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarAdController extends AbstractController
{
    #[Route('/car/ad', name: 'app_car_ad')]
    public function index(): Response
    {
        return $this->render('car_ad/index.html.twig', [
            'controller_name' => 'CarAdController',
        ]);
    }
}
