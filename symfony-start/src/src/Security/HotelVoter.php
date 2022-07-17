<?php

namespace App\Security;

use App\Entity\Hotel;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class HotelVoter extends Voter
{

    const EDIT = 'edit';
    const DELETE = 'delete';

    protected function supports(string $attribute, mixed $subject): bool
    {
        if ($subject instanceof Hotel) {
            return true;
        }

        return false;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        if ($attribute == self::EDIT) {
            return true;
        }

        $user = $token->getUser();

        if (!$user instanceof \App\Entity\User) {
            // the user must be logged in; if not, deny access
            return false;
        }

        /** @var Hotel $hotel */
        $hotel = $subject;


        if ($attribute == self::DELETE) {
            return $this->delete($hotel, $user);
        }

        return false;
    }

    private function delete(): bool
    {
        return true;
    }
}

