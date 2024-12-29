<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinistrySeeder extends Seeder
{
    public function run(): void
    {
        $ministries = [
            [
                'name' => 'Media',
                'description' => 'Serve through multimedia, photography, and video production.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Services',
                'description' => 'Help coordinate and organize church services and events.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PW',
                'description' => 'Lead worship and musical aspects of our services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Social Area',
                'description' => 'Organize community outreach and social activities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Spotlight',
                'description' => 'Handle stage lighting and production during events.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'A Team',
                'description' => 'Coordinate and manage various church activities.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ministries')->insert($ministries);
    }
}