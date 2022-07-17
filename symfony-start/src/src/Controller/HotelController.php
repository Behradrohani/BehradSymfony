<?php

namespace App\Controller;

use App\Entity\Hotel;
use App\Form\HotelType;
use App\Repository\HotelRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Gedmo\Translatable\Entity\Translation;

#[Route('/hotel')]
class HotelController extends AbstractController
{

    #[Route('/{_locale<en|fa>}/', name: 'app_hotel_index', methods: ['GET'])]
    public function index(HotelRepository $hotelRepository): Response
    {
        return $this->render('hotel/index.html.twig', [
            'hotels' => $hotelRepository->findAll(),
        ]);
    }

    #[IsGranted('ROLE_HOTEL_OWNER')]
    #[Route('/new/{_locale<en|fa>}/', name: 'app_hotel_new', defaults: ['_locale' => 'en'], methods: ['GET', 'POST'])]
    public function new(Request $request, HotelRepository $hotelRepository): Response
    {
        $hotel = new Hotel();
        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hotelRepository->add($hotel);

            return $this->redirectToRoute('app_hotel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hotel/new.html.twig', [
            'hotel' => $hotel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/{_locale<en|fa>}/', name: 'app_hotel_show', defaults: ['_locale' => 'en'], methods: ['GET'])]
    public function show(Hotel $hotel): Response
    {
        return $this->render('hotel/show.html.twig', [
            'hotel' => $hotel,
        ]);
    }

//    #[IsGranted('ROLE_HOTEL_OWNER')]
    #[Route('/{id}/edit/{_locale<en|fa>}/', name: 'app_hotel_edit', defaults: ['_locale' => 'en'], methods: ['GET', 'POST'])]
    public function edit(Request $request, Hotel $hotel, HotelRepository $hotelRepository): Response
    {
        $this->denyAccessUnlessGranted('edit', $hotel);

        $form = $this->createForm(HotelType::class, $hotel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            $hotel->setTranslatableLocale($_locale);
            $hotelRepository->add($hotel);

            return $this->redirectToRoute('app_hotel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('hotel/edit.html.twig', [
            'hotel' => $hotel,
            'form' => $form,
        ]);
    }

//    #[IsGranted('ROLE_HOTEL_OWNER')]
    #[Route('/{id}/{_locale<en|fa>}/', name: 'app_hotel_delete', defaults: ['_locale' => 'en'], methods: ['POST'])]
    public function delete(Request $request, Hotel $hotel, HotelRepository $hotelRepository): Response
    {
        $this->denyAccessUnlessGranted('delete', $hotel);

        if ($this->isCsrfTokenValid('delete'.$hotel->getId(), $request->request->get('_token'))) {
            $hotelRepository->remove($hotel);
        }

        return $this->redirectToRoute('app_hotel_index', [], Response::HTTP_SEE_OTHER);
    }

}
