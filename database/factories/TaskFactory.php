<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "initial_date" => $this->faker->date(),
            "initial_hour" => $this->faker->date("h:i"),
            "final_date" => $this->faker->date(),
            "final_hour" => $this->faker->date("h:i"),
            "description" => $this->faker->text()
        ];
    }
}
