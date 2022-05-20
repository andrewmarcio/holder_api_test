<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_task_delete()
    {
        $taskData = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "final_date" => $this->dateNow->format("Y-m-d"),
            "final_hour" => $this->dateNow->addMinutes(5)->format("H:i"),
            "description" => $this->faker->text
        ];

        $task = Task::create($taskData);

        $this->delete(route("task.delete", ["taskId" => $task->id]))
            ->assertNoContent();

        $this->assertDatabaseMissing("tasks", $taskData);
    }
}
