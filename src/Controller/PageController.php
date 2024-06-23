<?php

namespace App\Controller;

use App\Repository\CarAdRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('page/index.html.twig');
    }

    #[Route('/about', name: 'app_about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig');
    }

    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('page/services.html.twig');
    }

    #[Route('/login', name: 'app_login')]
    public function login(): Response
    {
        return $this->render('security/login.html.twig');
    }

    #[Route('/signup', name: 'app_signup')]
    public function signup(): Response
    {
        return $this->render('security/signup.html.twig');
    }

    #[Route('/voitures', name: 'car_ad_list', methods: ['GET'])]
    public function list(CarAdRepository $carAdRepository, LoggerInterface $logger): Response
    {
        $user = $this->getUser();
        $logger->info('Accessing /voitures as: ', ['user' => $user, 'roles' => $user ? $user->getRoles() : 'anonymous']);
        return $this->render('page/car_ad_list.html.twig', [
            'car_ads' => $carAdRepository->findAll(),
        ]);
    }
}
