<?php

namespace App\Infrastructure\Repository;

use App\Core\Domain\Repository\DeveloperRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Core\Domain\Entity\Developer\Developer;

/**
 * Репозиторий для сущности Developer, предоставляющий методы для доступа и манипуляции данными разработчиков.
 */
class DeveloperRepository extends ServiceEntityRepository implements DeveloperRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Developer::class);
    }

    /**
    * Находит и возвращает разработчиков, работающих над проектом с указанным идентификатором.
    *
    * @param int $projectId Идентификатор проекта.
    * @return Developer[] Массив разработчиков, привязанных к проекту.
    */
//    public function findByProject($projectId)
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.project = :projectId')
//            ->setParameter('projectId', $projectId)
//            ->getQuery()
//            ->getResult();
//    }

    /**
     * Создает и возвращает новый экземпляр Developer.
     *
     * @return Developer Новый экземпляр Developer.
     */
    public function createDeveloper(): Developer
    {
        return new Developer();
    }
}
