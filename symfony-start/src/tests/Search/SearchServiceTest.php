<?php

namespace App\Tests\Search;

use App\Search\SearchService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SearchServiceTest extends KernelTestCase
{
    public function testSearchBook()
    {
        self::bootKernel();
        $container = static::getContainer();
        /** @var SearchService $searchService */
        $searchService = $container->get(SearchService::class);
        $result = $searchService->searchHotel("Elizeh");
        $this->assertNotEmpty($result);
    }

}