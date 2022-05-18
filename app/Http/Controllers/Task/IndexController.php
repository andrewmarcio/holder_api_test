<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class IndexController extends BaseTaskController
{
    public function __invoke(): JsonResponse
    {
        return JsonResponse::create(
            $this->taskRepository->getAllTasks(),
            Response::HTTP_OK
        );
    }
}
