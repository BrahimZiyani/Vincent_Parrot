<?php

namespace App\Controller;

use App\Entity\CarAd;
use App\Form\CarAdType;
use App\Repository\CarAdRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
    public function new(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $carAd = new CarAd();
        $form = $this->createForm(CarAdType::class, $carAd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('picture')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('pictures_directory'),
                        $newFilename
                    );
                    $carAd->setPicture($newFilename);
                } catch (FileException $e) {
                    return new Response('File upload failed: ' . $e->getMessage());
                }
            }

            $entityManager->persist($carAd);
            $entityManager->flush();

            return $this->redirectToRoute('car_ad_index');
        }

        return $this->render('car_ad/new.html.twig', [
            'car_ad' => $carAd,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{carId}', name: 'car_ad_show', methods: ['GET'])]
    public function show(CarAd $carAd): Response
    {
        return $this->render('car_ad/show.html.twig', [
            'car_ad' => $carAd,
        ]);
    }

    #[Route('/{carId}/edit', name: 'car_ad_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CarAd $carAd, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CarAdType::class, $carAd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('picture')->getData();
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('pictures_directory'),
                        $newFilename
                    );
                    $carAd->setPicture($newFilename);
                } catch (FileException $e) {
                    return new Response('File upload failed: ' . $e->getMessage());
                }
            }

            $entityManager->flush();

            return $this->redirectToRoute('car_ad_index');
        }

        return $this->render('car_ad/edit.html.twig', [
            'car_ad' => $carAd,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{carId}', name: 'car_ad_delete', methods: ['POST'])]
    public function delete(Request $request, CarAd $carAd, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carAd->getCarId(), $request->request->get('_token'))) {
            $entityManager->remove($carAd);
            $entityManager->flush();
        }

        return $this->redirectToRoute('car_ad_index');
    }
}
