<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'title' => 'Youth Camp 2024 Announcement',
                'content' => 'Join us for an amazing weekend of worship, fellowship, and growth at our upcoming Youth Camp!',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Worship Series Starting',
                'content' => 'Get ready for our new worship series exploring the fundamentals of faith and modern Christian living.',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Community Outreach Success',
                'content' => 'Thank you to all volunteers who participated in our recent community service event.',
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Welcome New Members',
                'content' => "We're excited to welcome all our new members who joined FLCC this month!",
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}