<?php

namespace App\Entity;

use App\Model\TimeInterface;
use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event extends Attraction implements TimeInterface
{
    #[ORM\Column(type: 'string', length: 255)]
    protected $orgnizer;

    #[ORM\Column(type: 'datetime')]
    protected $startDateTime;

    #[ORM\Column(type: 'datetime')]
    protected $endDateTime;

    public function getOrgnizer(): ?string
    {
        return $this->orgnizer;
    }

    public function setOrgnizer(string $orgnizer): self
    {
        $this->orgnizer = $orgnizer;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeInterface
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(\DateTimeInterface $startDateTime): self
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?\DateTimeInterface
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(\DateTimeInterface $endDateTime): self
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }
}
