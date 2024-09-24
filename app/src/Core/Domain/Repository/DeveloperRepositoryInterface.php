<?php

namespace App\Core\Domain\Repository;

/**
 * Interface DeveloperRepositoryInterface
 *
 * Интерфейс репозитория для доступа к объекту разработчики.
 */
interface DeveloperRepositoryInterface
{
    /**
     * Находит разработчика по идентификатору.
     *
     * @param int $id Уникальный идентификатор разработчика.
     * @return Developer|null Возвращает объект разработчика или null, если разработчик не найден.
     */
    //public function find($id);
    
    /**
     * Возвращает всех разработчиков.
     *
     * @return Developer[] Возвращает массив всех разработчиков.
     */
    //public function findAll();
    
    /**
     * Находит разработчиков, работающих над проектом с заданным идентификатором.
     *
     * @param int $projectId Идентификатор проекта.
     * @return Developer[] Возвращает массив разработчиков для проекта.
     */
    //public function findByProject($projectId);
    
    /**
     * Находит разработчиков по полному имени.
     *
     * @param string $fullName Полное имя для поиска.
     * @return Developer[] Возвращает массив разработчиков с соответствующим полным именем.
     */
    //public function findByName($fullName);

    /**
     * Создает нового разработчика.
     *
     * @return Developer Возвращает созданный объект разработчик.
     */
    public function createDeveloper();
}
