<?php

namespace App\Http\Controllers\Task;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShowController extends BaseTaskController
{
    public function __invoke(Request $request): JsonResponse
    {
        $taskId = $request->route("taskId");
        return JsonResponse::create(
            $this->taskRepository->getTask($taskId),
            Response::HTTP_OK
        );
    }
}
