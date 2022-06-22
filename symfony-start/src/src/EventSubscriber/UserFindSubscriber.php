<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Model\FindUserCreateInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Security;

class UserFindSubscriber implements EventSubscriberInterface
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function getSubscribedEvents()
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        /**
         * @var User $user
         */
        $user = $this->tokenStorage->getToken()->getUser();

        if ($entity instanceof FindUserCreateInterface && $user) {
            $entity->setCreateUsername($user->getUserName());
            $entity->setUpdateUsername($user->getUserName());
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        /**
         * @var User $user
         */
        $user = $this->tokenStorage->getToken()->getUser();

        if ($entity instanceof FindUserCreateInterface && $user) {
            $entity->setUpdateUsername($user->getUserName());
        }
    }


}