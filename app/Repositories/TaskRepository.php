<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function getAllTasks(): Collection
    {
        return Task::all();
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
        $task = Task::find($taskId);
        $task->update($taskDetails);
        return $task;
    }

    public function destroyTask(int $taskId): void
    {
        Task::destroy($taskId);
    }
}
