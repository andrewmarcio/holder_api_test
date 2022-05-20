<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class TaskStoreTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_task_with_final()
    {
        $payLoad = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "final_date" => $this->dateNow->format("Y-m-d"),
            "final_hour" => $this->dateNow->addMinutes(5)->format("H:i"),
            "description" => $this->faker->text
        ];

        $this->post(route("task.store"), $payLoad)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('tasks', $payLoad);
    }

    public function test_store_task_without_final()
    {

        $payLoad = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "description" => $this->faker->text
        ];

        $this->post(route("task.store"), $payLoad)
            ->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('tasks', $payLoad);
    }

    public function test_store_task_validation_request_equal_final_time()
    {
        $payLoad = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "final_date" => $this->dateNow->format("Y-m-d"),
            "final_hour" => $this->dateNow->format("h:i"),
            "description" => $this->faker->text
        ];

        $this->post(route("task.store"), $payLoad)
            ->assertSessionHasErrors();
    }

    public function test_store_task_validation_request_final_date_before_initial()
    {
        $payLoad = [
            "initial_date" => $this->dateNow->format("Y-m-d"),
            "initial_hour" => $this->dateNow->format("h:i"),
            "final_date" => $this->dateNow->subDay(1)->format("Y-m-d"),
            "final_hour" => $this->dateNow->format("h:i"),
            "description" => $this->faker->text
        ];

        $this->post(route("task.store"), $payLoad)
            ->assertSessionHasErrors();
    }
}
