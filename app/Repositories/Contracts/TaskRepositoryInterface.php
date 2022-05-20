<?php

namespace App\Repositories\Contracts;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function getAllTasks(): Collection;
    public function getTask(int $taskId): ?Task;
    public function createTask(array $taskDetails): Task;
    public function updateTask(int $taskId, array $taskDetails): Task;
    public function destroyTask(int $taskId): void;
}
