<?php

namespace App\Model;

interface FindUserCreateInterface
{
    public function  getCreateUsername();

    public function setCreateUsername(String $createUsername);

    public function getUpdateUsername();

    public function setUpdateUsername(String $updateUsername);

}