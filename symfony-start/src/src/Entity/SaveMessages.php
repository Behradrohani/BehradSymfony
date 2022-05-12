<?php

namespace App\Entity;

use App\Repository\SaveMessagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SaveMessagesRepository::class)]
class SaveMessages
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255), Assert\NotBlank, Assert\Regex(pattern:"/\D/")]
    #Assert\NotBlank
    private $name;

    #[ORM\Column(type: 'string', length: 255), Assert\NotBlank]
    #Assert\NotBlank
    private $title;

    #[ORM\Column(type: 'string', length: 512), Assert\NotBlank]
    private $message;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
