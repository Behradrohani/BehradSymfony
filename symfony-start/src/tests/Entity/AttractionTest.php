<?php

namespace App\Tests\Entity;

use App\Entity\Attraction;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\at;

class AttractionTest extends TestCase
{

    public function testSetName()
    {
        $attraction = new Attraction();
        $attraction->setName('behrad');
        $this->assertEquals('behrad', $attraction->getName());
    }

    public function testSetFullDescription()
    {
        $attraction = new Attraction();
        $attraction->setFullDescription('Full Description');
        $this->assertEquals('Full Description', $attraction->getFullDescription());

    }

    public function testSetShortDescription()
    {
        $attraction = new Attraction();
        $attraction->setShortDescription('Short Description');
        $this->assertEquals('Short Description', $attraction->getShortDescription());
    }

    public function testSetScore()
    {
        $attraction = new Attraction();
        $attraction->setScore(10);
        $this->assertEquals(10, $attraction->getScore());
    }
}
