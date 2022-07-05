<?php

namespace App\Controller;

use App\Search\SearchService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function search(Request $request, SearchService $searchService): Response
    {
        $returnValue = $request->query->get('query');

        $hotelList = $searchService->searchHotel($returnValue);

        return $this->render('search/index.html.twig', [
            'query'=> $returnValue,
          'hotelSearch' => $hotelList
        ]);
    }
}
