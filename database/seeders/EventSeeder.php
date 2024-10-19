<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function (User $user) {
            Event::factory(2)
            ->for($user)
            ->create();
        });
    }
}
