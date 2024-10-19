<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        Event::all()->each(function (Event $event){
            Guest::factory(5)
            ->for($event)
            ->create();
        });
    }
}
