<?php

namespace App\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait UserTrait
{
    /**
     * @ORM\Column(type="string", nullable=true, length=250)
     */
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private $createUsername;

    /**
     * @ORM\Column(type="string", nullable=true, length=250)
     */
    #[ORM\Column(type: Types::STRING, nullable: true)]
    private $UpdateUsername;

    /**
     * @return mixed
     */
    public function getCreateUsername()
    {
        return $this->createUsername;
    }

    /**
     * @param mixed $createUsername
     */
    public function setCreateUsername($createUsername): void
    {
        $this->createUsername = $createUsername;
    }

    /**
     * @return mixed
     */
    public function getUpdateUsername()
    {
        return $this->UpdateUsername;
    }

    /**
     * @param mixed $UpdateUsername
     */
    public function setUpdateUsername($UpdateUsername): void
    {
        $this->UpdateUsername = $UpdateUsername;
    }


}