<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{

    public function definition(): array
    {
        $ddd = $this->faker->numberBetween(11, 99);
        $number = $this->faker->numberBetween(100000000, 999999999);

        return [
            "name" => $this->faker->name,
            "phone" => $ddd.$number,
            "event_id" => Event::factory()
        ];
    }
}
