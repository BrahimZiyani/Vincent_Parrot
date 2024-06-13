<?php

namespace App\Controller;

use App\Entity\CarAd;
use App\Form\CarAdType;
use App\Repository\CarAdRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/car_ad')]
class CarAdController extends AbstractController
{
    #[Route('/', name: 'car_ad_index', methods: ['GET'])]
    public function index(CarAdRepository $carAdRepository): Response
    {
        return $this->render('car_ad/index.html.twig', [
            'car_ads' => $carAdRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'car_ad_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carAd = new CarAd();
        $form = $this->createForm(CarAdType::class, $carAd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carAd);
            $entityManager->flush();

            return $this->redirectToRoute('car_ad_index');
        }

        return $this->render('car_ad/new.html.twig', [
            'car_ad' => $carAd,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{car_id}', name: 'car_ad_show', methods: ['GET'])]
    public function show(CarAd $carAd): Response
    {
        return $this->render('car_ad/show.html.twig', [
            'car_ad' => $carAd,
        ]);
    }

    #[Route('/{car_id}/edit', name: 'car_ad_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CarAd $carAd, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarAdType::class, $carAd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('car_ad_index');
        }

        return $this->render('car_ad/edit.html.twig', [
            'car_ad' => $carAd,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{car_id}', name: 'car_ad_delete', methods: ['POST'])]
    public function delete(Request $request, CarAd $carAd, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carAd->getCarId(), $request->request->get('_token'))) {
            $entityManager->remove($carAd);
            $entityManager->flush();
        }

        return $this->redirectToRoute('car_ad_index');
    }
}
