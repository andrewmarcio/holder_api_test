<?php

namespace App\Repositories\Contracts;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function getAllTasks(): array;
    public function getTask(int $taskId): ?Task;
    public function createTask(array $taskDetails): Task;
    public function updateTask(int $taskId, array $taskDetails): Task;
    public function destroyTask(int $taskId): void;
}
