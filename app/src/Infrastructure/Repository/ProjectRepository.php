<?php

namespace App\Infrastructure\Repository;

use App\Core\Domain\Repository\DeveloperRepositoryInterface;
use App\Core\Domain\Repository\ProjectRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Core\Domain\Entity\Project;

/**
 * Репозиторий для сущности Project, предоставляющий методы для доступа и манипуляции данными проекта.
 */
class ProjectRepository extends ServiceEntityRepository implements ProjectRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    /**
     * Создает и возвращает новый экземпляр Project.
     *
     * @return Project Новый экземпляр Project.
     */
    public function createProject(): Project
    {
        return new Project();
    }
}
