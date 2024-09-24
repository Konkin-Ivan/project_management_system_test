<?php

namespace App\Core\Domain\Repository;

/**
 * Interface ProjectRepositoryInterface
 *
 * Интерфейс репозитория для доступа к объекту проекты.
 */
interface ProjectRepositoryInterface
{
    /**
     * Создает нового разработчика.
     *
     * @return Project Возвращает созданный объект проекты.
     */
    public function createProject();
}
