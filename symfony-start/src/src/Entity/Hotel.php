<?php

namespace App\Entity;

use App\Model\FindUserCreateInterface;
use App\Model\TimeInterface;
use App\Model\TimeTrait;
use App\Model\UserTrait;
use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Translatable\Translatable;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false, hardDelete: true)]
class Hotel implements TimeInterface, FindUserCreateInterface
{
    use TimeTrait;
    use SoftDeleteableEntity;
    use UserTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

//    #[Gedmo\Translatable]
    #[ORM\Column(type: 'string', length: 255)]
    private $name;

//    #[Gedmo\Translatable]
    #[ORM\Column(type: 'string', length: 255)]
    private $city;

//    #[Gedmo\Translatable]
    #[ORM\Column(type: 'string', length: 255)]
    private $star;

//    #[Gedmo\Translatable]
    #[ORM\Column(type: 'string', length: 255)]
    private $facilities;

//    #[Gedmo\Translatable]
    #[ORM\Column(type: 'string', length: 255)]
    private $price;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Room::class, orphanRemoval: true)]
    private $rooms;

//    /**
//     * @Gedmo\Locale
//     * Used locale to override Translation listener`s locale
//     * this is not a mapped field of entity metadata, just a simple property
//     */
//    #[Gedmo\Locale]
//    private $locale;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStar(): ?string
    {
        return $this->star;
    }

    public function setStar(string $star): self
    {
        $this->star = $star;

        return $this;
    }

    public function getFacilities(): ?string
    {
        return $this->facilities;
    }

    public function setFacilities(string $facilities): self
    {
        $this->facilities = $facilities;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, Room>
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }

    public function addRoom(Room $room): self
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms[] = $room;
            $room->setHotel($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): self
    {
        if ($this->rooms->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getHotel() === $this) {
                $room->setHotel(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

//    public function setTranslatableLocale($locale)
//    {
//        $this->locale = $locale;
//    }

}
