<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DeleteController extends BaseTaskController
{
    public function __invoke(Request $request): JsonResponse
    {
        $taskId = $request->route("taskId");
        $this->taskRepository->destroyTask($taskId);
        return JsonResponse::create(null, Response::HTTP_NO_CONTENT);
    }
}
