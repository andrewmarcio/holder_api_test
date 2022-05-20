<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskShowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_task()
    {
        $task = Task::factory(1)->create()->first();

        $this->get(route("task.show", ["taskId" => $task->id]))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                    "id",
                    "initial_date",
                    "initial_hour",
                    "final_date",
                    "final_hour",
                    "description",
                    "created_at",
                    "updated_at"
            ]);
    }
}
