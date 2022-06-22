<?php

namespace App\Entity;

use App\Model\TimeInterface;
use App\Repository\LocationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location extends Attraction implements TimeInterface
{
    #[ORM\Column(type: 'integer')]
    protected $longitude;

    #[ORM\Column(type: 'integer')]
    protected $latitude;

    public function getLongitude(): ?int
    {
        return $this->longitude;
    }

    public function setLongitude(int $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?int
    {
        return $this->latitude;
    }

    public function setLatitude(int $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }
}
