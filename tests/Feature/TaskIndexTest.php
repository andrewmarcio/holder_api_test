<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskIndexTest extends TestCase
{
    use DatabaseTransactions;

    public function test_task_list()
    {
        Task::factory(3)->create();

        $this->get(route('task.index'))
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                "*" => [
                    "id",
                    "initial_date",
                    "initial_hour",
                    "final_date",
                    "final_hour",
                    "description",
                    "created_at",
                    "updated_at"
                ]
            ]);
    }
}
