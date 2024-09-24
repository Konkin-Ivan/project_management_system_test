<?php

namespace App\Core\Domain\Entity\Developer;

use App\Infrastructure\Repository\DeveloperRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity(repositoryClass: DeveloperRepository::class)]
class Developer
{
    #[Id]
    #[Column(name: 'id', type: 'integer')]
    #[GeneratedValue(strategy: 'IDENTITY')]
    private int $id;

    #[Column(name: 'full_name', type: 'string', length: 255)]
    private string $fullName;

    #[ManyToOne(targetEntity: DeveloperTitle::class)]
    #[JoinColumn(name: 'developer_title_id', referencedColumnName: 'id')]
    private DeveloperTitle $developerTitle;

    #[Column(name: 'email', type: 'string', length: 255)]
    private string $email;

    #[Column(name: 'telephone_number', type: 'string', length: 255)]
    private string $telephoneNumber;

    #[ManyToOne(targetEntity: Project::class, inversedBy: 'developers')]
    #[JoinColumn(name: 'project_id', referencedColumnName: 'id')]
    private ?Project $project;

    // Геттер для ID
    public function getId(): int
    {
        return $this->id;
    }

    // Геттер и сеттер для полного имени
    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;
        return $this;
    }

    // Геттер и сеттер для должности (DeveloperTitle)
    public function getDeveloperTitle(): DeveloperTitle
    {
        return $this->developerTitle;
    }

    public function setDeveloperTitle(DeveloperTitle $developerTitle): self
    {
        $this->developerTitle = $developerTitle;
        return $this;
    }

    // Геттер и сеттер для email
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    // Геттер и сеттер для контактного телефона
    public function getTelephoneNumber(): string
    {
        return $this->telephoneNumber;
    }

    public function setTelephoneNumber(string $telephoneNumber): self
    {
        $this->telephoneNumber = $telephoneNumber;
        return $this;
    }

    // Геттер и сеттер для проекта
    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;
        return $this;
    }
}
