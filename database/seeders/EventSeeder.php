<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'title' => 'Youth Christmas Celebration',
                'description' => 'Join us for a special Christmas celebration with worship, games, and fellowship!',
                'date' => Carbon::now()->addDays(15),
                'location' => 'Main Auditorium',
                'status' => 'upcoming',
                'capacity' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Year Prayer Night',
                'description' => 'Start the new year with a powerful night of prayer and worship.',
                'date' => Carbon::now()->addDays(20),
                'location' => 'Prayer Room',
                'status' => 'upcoming',
                'capacity' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fall Youth Camp',
                'description' => 'A wonderful time of fellowship and spiritual growth at our annual youth camp.',
                'date' => Carbon::now()->subMonths(2),
                'location' => 'Mountain Retreat Center',
                'status' => 'past',
                'capacity' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}