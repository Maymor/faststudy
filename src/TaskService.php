<?php

namespace Dmitry\Faststudy;

use Dmitry\Faststudy\Services\Storage\FileStorage;

class TaskService
{
    private array $tasks = [];

    //Вытащить файлы из нашего хранилища, представить в виде ассоциативного массива со всеми проверками на отсутствие и пустой файл
    public function getAllTasks(): array
    {
        if (!empty($this->tasks)) {
            return $this->tasks;
        }

        if (!file_exists(FileStorage::getTasksPath())) {
            return $this->tasks;
        }
        $data = file_get_contents(FileStorage::getTasksPath());
        if (!$data) {
            return $this->tasks;
        }
        $tasks = json_decode($data, true);
        return $tasks ?? $this->tasks;
    }

    //Получение id для следующей задачи
    public function getNextId(): int
    {
        //Метод получения максимального id и вернуть +1
        $tasks = $this->getAllTasks();
        if (empty($tasks)) {
            return 1;
        }

        $ids = array_column($tasks, 'id');

        return max($ids) + 1;
    }
    //Создание задачи
    public function createTask(string $taskName): Task
    {
        //Метод с использованием getNextId и конструтором Task
        return new Task($taskName, $this->getNextId());
    }
    //Сохранение задачи в хранилище
    public function saveTask(Task $task): void
    {
        $tasks = $this->getAllTasks();
        $tasks[]= $task->toArray();

        file_put_contents(FileStorage::getTasksPath(), json_encode($tasks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}