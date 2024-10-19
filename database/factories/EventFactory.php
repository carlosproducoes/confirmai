<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{

    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence,
            "date" => $this->faker->date,
            "time" => $this->faker->time,
            "user_id" => User::factory()
        ];
    }
}
