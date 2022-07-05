<?php

namespace App\Entity;

use App\Model\FindUserCreateInterface;
use App\Model\TimeInterface;

use App\Model\TimeTrait;
use App\Model\UserTrait;
use App\Repository\AttractionRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: AttractionRepository::class)]
#[ORM\InheritanceType("SINGLE_TABLE")]
#[ORM\DiscriminatorColumn(name:"type", type:"string")]
#[ORM\DiscriminatorMap(["attraction" => "Attraction", "location" => "Location", "event" => "Event"])]
class Attraction implements TimeInterface,FindUserCreateInterface
{
    use TimeTrait;
    use UserTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 512, nullable: true)]
    private $shortDescription;

    #[ORM\Column(type: 'text', nullable: true)]
    private $fullDescription;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $score;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

}
