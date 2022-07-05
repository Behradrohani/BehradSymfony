<?php

namespace App\Tests\Controller;

use App\Controller\SearchController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchControllerTest extends WebTestCase
{

    public function testSearch()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/search?query=Elizeh');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h5', 'Elizeh');
    }
}
