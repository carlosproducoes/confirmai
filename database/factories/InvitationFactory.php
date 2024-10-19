<?php

namespace Database\Factories;

use App\Models\Guest;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvitationFactory extends Factory
{

    public function definition(): array
    {
        $status = ['invited', 'confirmed', 'refused'];

        return [
            "status" => $this->faker->randomElement($status),
            "guest_id" => Guest::factory()
        ];
    }
}
