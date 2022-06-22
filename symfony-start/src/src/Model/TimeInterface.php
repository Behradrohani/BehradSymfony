<?php

namespace App\Model;

interface TimeInterface
{
    public function getCreatedAt();

    public function setCreatedAt(\DateTimeImmutable $dateTime);

    public function getUpdatedAt();

    public function setUpdatedAt(\DateTimeImmutable $dateTime);
}