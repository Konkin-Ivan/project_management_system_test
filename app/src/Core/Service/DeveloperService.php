<?php

namespace App\Core\Service;

use App\Core\Domain\Entity\Developer\Developer;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Сервис для управления разработчиками.
 *
 * Сервис предоставляет набор операций для работы с объектами разработчики,
 * включая создание новых записей в базе данных, обновление, удаление.
 */
class DeveloperService
{
    /**
     * Менеджер сущностей для взаимодействия с базой данных.
     *
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * Конструктор сервиса разработчиков.
     *
     * @param EntityManagerInterface $entityManager Менеджер сущностей Doctrine.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Создает нового разработчика и сохраняет его в базе данных.
     *
     * @param string $fullName Полное имя разработчика.
     * @param string $email    Адрес электронной почты разработчика.
     * @param string $telephoneNumber Номер телефона разработчика.
     * @return Developer Возвращает объект нового разработчика.
     */
    public function createDeveloper(string $fullName, string $email, string $telephoneNumber): Developer
    {
        $developer = new Developer();
        $developer->setFullName($fullName);
        $developer->setEmail($email);
        $developer->setTelephoneNumber($telephoneNumber);

        $this->entityManager->persist($developer);
        $this->entityManager->flush();

        return $developer;
    }
}
