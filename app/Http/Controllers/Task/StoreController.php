<?php

namespace App\Http\Controllers\Task;

use App\Http\Requests\Task\TaskRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreController extends BaseTaskController
{
    public function __invoke(TaskRequest $request): JsonResponse
    {
        $taskDetails = $request->validated();
        $task = $this->taskRepository->createTask($taskDetails);

        return JsonResponse::create(
            ["message" => "Task Created Successfully."],
            Response::HTTP_CREATED
        );
    }
}
