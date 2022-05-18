<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks(): array
    {
        return Task::get();
    }

    public function getTask(int $taskId): ?Task
    {
        return Task::find($taskId);
    }

    public function createTask(array $taskDetails): Task
    {
        return Task::create($taskDetails);
    }

    public function updateTask(int $taskId, array $taskDetails): Task
    {
        return Task::whereId($taskId)->update($taskDetails);
    }

    public function destroyTask(int $taskId): void
    {
        Task::destroy($taskId);
    }
}
