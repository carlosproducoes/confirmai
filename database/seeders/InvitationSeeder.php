<?php

namespace Database\Seeders;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Database\Seeder;

class InvitationSeeder extends Seeder
{
    public function run(): void
    {
        Guest::all()->each(function (Guest $guest) {
            Invitation::factory()
            ->for($guest)
            ->create();
        });
    }
}
