<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskUpdateTest extends TestCase
{

    use DatabaseTransactions;

    public function test_update_all_fields()
    {

        $taskData = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "final_date" => $this->dateNow->format("Y-m-d"),
            "final_hour" => $this->dateNow->addMinutes(5)->format("H:i"),
            "description" => $this->faker->text
        ];

        $task = Task::create($taskData);

        $payLoad = [
            "initial_date" => $this->dateNow->addDay()->format("Y-m-d"),
            "initial_hour" => $this->dateNow->addHour(1)->format("h:i"),
            "final_date" => $this->dateNow->addDay()->format("Y-m-d"),
            "final_hour" => $this->dateNow->addHours(2)->format("H:i"),
            "description" => $this->faker->text
        ];

        $this->put(route('task.update', ["taskId" => $task->id]), $payLoad)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('tasks', $payLoad);
    }

    public function test_update_final_date_and_hour()
    {

        $taskData = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "description" => $this->faker->text
        ];

        $task = Task::create($taskData);

        $payLoad = [
            "final_date" => $this->dateNow->addDay()->format("Y-m-d"),
            "final_hour" => $this->dateNow->addHours(2)->format("H:i")
        ];

        $this->put(route('task.update', ["taskId" => $task->id]), $payLoad)
            ->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseHas('tasks', array_merge($taskData, $payLoad));
    }
}
