<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UpdateController extends BaseTaskController
{
    public function __invoke(TaskRequest $request): JsonResponse
    {
        $taskId = $request->route("taskId");
        $taskDetails = $request->validated();
        $task = $this->taskRepository->updateTask($taskId, $taskDetails);

        return JsonResponse::create(
            ["message" => "Task Created Successfully."],
            Response::HTTP_OK
        );
    }
}
