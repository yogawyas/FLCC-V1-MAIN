<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        // Add this line to call the MinistrySeeder
        $this->call([
            MinistrySeeder::class,
            AdminSeeder::class,
            EventSeeder::class,
            NewsSeeder::class
        ]);
    }
}