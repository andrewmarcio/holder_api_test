<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Http\Request;

class BaseTaskController extends Controller
{
    protected TaskRepositoryInterface $taskRepository;
    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
}
