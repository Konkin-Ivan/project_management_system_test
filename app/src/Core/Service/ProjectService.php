<?php

namespace App\Core\Service;

use App\Core\Domain\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Сервис для управления проектами.
 *
 * Данный сервис предоставляет набор операций для работы с объектами проекты,
 * включая создание новых записей в базе данных, обновление, удаление.
 */
class ProjectService
{
    /**
     * Менеджер сущностей для взаимодействия с базой данных.
     *
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * Конструктор сервиса проекты.
     *
     * @param EntityManagerInterface $entityManager Менеджер сущностей Doctrine.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Создает новый проект и сохраняет его в базе данных.
     *
     * @param string $projectName Имя проекта.
     * @param string $customer    Заказчик.
     * @return Project Возвращает объект нового проекта.
     */
    public function createProject(string $projectName, string $customer): Project
    {
        $project = new Project();
        $project->setProjectName($projectName);
        $project->setCustomer($customer);

        $this->entityManager->persist($project);
        $this->entityManager->flush();

        return $project;
    }
}
