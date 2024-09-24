<?php

namespace App\Core\Domain\Entity;

use App\Infrastructure\Repository\ProjectRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[Id]
    #[Column(name: 'id', type: 'integer')]
    #[GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[Column(name: 'project_name', type: 'string', length: 255)]
    private string $projectName;

    #[ManyToOne(targetEntity: Developer::class)]
    #[JoinColumn(name: 'developer_team', referencedColumnName: 'id')]
    private Developer $developerTeam;

    #[ManyToOne(targetEntity: Customer::class)]
    #[JoinColumn(name: 'name', referencedColumnName: 'id')]
    #[Column(name: 'customer', type: 'string', length: 255)]
    private Customer $customer;

    // Геттер для ID
    public function getId(): int
    {
        return $this->id;
    }

    // Геттер и сеттер для названия проекта
    public function getProjectName(): string
    {
        return $this->projectName;
    }

    public function setProjectName(string $projectName): self
    {
        $this->projectName = $projectName;
        return $this;
    }

    // Геттер и сеттер для команды разработчиков
    public function getDeveloperTeam()
    {
        return $this->developerTeam;
    }

    public function setDeveloperTeam($developerTeam): self
    {
        $this->developerTeam = $developerTeam;
        return $this;
    }

    // Геттер и сеттер для заказчика
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }
}
