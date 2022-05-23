<?php

namespace App\Menu;

use App\Entity\Blog;
use App\Entity\Hotel;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class Builder
{

    private EntityManagerInterface $entityManager;
    private FactoryInterface $factory;

    public function __construct(FactoryInterface $factory, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->factory = $factory;
    }

    public function mainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('About Us', ['route' => 'app_about']);
        $menu->addChild('Contact US', ['route' => 'app_contact_us']);
        $hotelMenu = $menu->addChild("Hotels List", ['route' => 'app_hotel_index']);

        /** @var Hotel[] $Hotels */
        $Hotels = $this->entityManager->getRepository(Hotel::class)->findAll();

        foreach ($Hotels as $hotel) {
            $hotelMenu->addChild($hotel->getName(), [
                'route' => 'app_hotel_show',
                'routeParameters' => ['id' => $hotel->getId()],
            ]);
        }

        return $menu;
    }
}