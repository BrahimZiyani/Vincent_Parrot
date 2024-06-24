<?php

namespace App\Controller;

use App\Repository\CarAdRepository;
use App\Entity\CarAd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/voitures', name: 'app_voitures')]
    public function voitures(CarAdRepository $carAdRepository): Response
    {
        return $this->render('page/car_ad_list.html.twig', [
            'car_ads' => $carAdRepository->findAll(),
        ]);
    }

    #[Route('/voiture/{carId}', name: 'car_ad_show', methods: ['GET'])]
    public function show(CarAd $carAd): Response
    {
        return $this->render('page/show.html.twig', [
            'car_ad' => $carAd,
        ]);
    }

    #[Route('/api/voitures', name: 'api_voitures', methods: ['GET'])]
    public function apiVoitures(CarAdRepository $carAdRepository): JsonResponse
    {
        $brand = $_GET['brand'] ?? null;
        $mileage = $_GET['mileage'] ?? null;
        $price = $_GET['price'] ?? null;

        $queryBuilder = $carAdRepository->createQueryBuilder('car');

        if ($brand) {
            $queryBuilder->andWhere('car.brand LIKE :brand')
                ->setParameter('brand', '%' . $brand . '%');
        }

        if ($mileage) {
            $queryBuilder->andWhere('car.mileage <= :mileage')
                ->setParameter('mileage', $mileage);
        }

        if ($price) {
            $queryBuilder->andWhere('car.price <= :price')
                ->setParameter('price', $price);
        }

        $carAds = $queryBuilder->getQuery()->getResult();

        $data = array_map(function (CarAd $carAd) {
            return [
                'carId' => $carAd->getCarId(),
                'brand' => $carAd->getBrand(),
                'price' => $carAd->getPrice(),
                'year' => $carAd->getYear(),
                'mileage' => $carAd->getMileage(),
                'picture' => $carAd->getPicture(),
                'manager' => $carAd->getManager() ? $carAd->getManager()->getName() : null,
            ];
        }, $carAds);

        return new JsonResponse($data);
    }
}
