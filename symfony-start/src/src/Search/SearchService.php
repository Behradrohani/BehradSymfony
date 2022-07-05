<?php

namespace App\Search;

use App\Entity\Hotel;
use Doctrine\ORM\EntityManagerInterface;

class SearchService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function searchHotel($input)
    {
        $hotelRepository = $this->entityManager->getRepository(Hotel::class);

        return $hotelRepository->
        createQueryBuilder('h')->
        where('h.name like :h')->
        setParameter('h', '%'.$input.'%')->
        getQuery()->
        getResult();
    }
}