<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Customer
{
    #[Id]
    #[Column(type: 'integer')]
    #[GeneratedValue]
    private int $id;

    #[Column(type: 'string')]
    private string $name;
}
