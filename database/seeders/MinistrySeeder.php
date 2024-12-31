<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ministry;

class MinistrySeeder extends Seeder
{
    public function run()
    {
        $ministries = [
            [
                'name' => 'Worship Team',
                'description' => 'Join our worship team to lead the congregation in praise and worship through music, singing, and playing instruments. We welcome those with musical talents and a heart for worship.',
                'image' => null, // You can add actual image paths later
                'meeting_time' => 'Every Saturday, 4:00 PM',
                'location' => 'Main Hall',
                'status' => 'open',
                'total_slots' => 20
            ],
            [
                'name' => 'Media & Technology',
                'description' => 'Be part of our media team handling live streaming, sound systems, presentations, and social media. Perfect for tech-savvy individuals who want to serve through digital ministry.',
                'image' => null,
                'meeting_time' => 'Every Sunday, 7:00 AM',
                'location' => 'Tech Room',
                'status' => 'open',
                'total_slots' => 15
            ],
            [
                'name' => 'Welcome Team',
                'description' => 'Create a warm and welcoming environment for everyone who visits our church. The welcome team is the first point of contact for newcomers and regular attendees alike.',
                'image' => null,
                'meeting_time' => 'Every Sunday, 8:00 AM',
                'location' => 'Church Entrance',
                'status' => 'open',
                'total_slots' => 25
            ],
            [
                'name' => 'Bible Study Leaders',
                'description' => 'Lead and facilitate small group Bible studies. We\'re looking for individuals with a deep understanding of Scripture and a passion for teaching others.',
                'image' => null,
                'meeting_time' => 'Wednesday, 7:00 PM',
                'location' => 'Small Group Rooms',
                'status' => 'closed',
                'total_slots' => 10
            ],
            [
                'name' => 'Prayer Warriors',
                'description' => 'Join our dedicated team of intercessors who pray for the church, community, and specific prayer requests. This ministry focuses on spiritual warfare and sustained prayer.',
                'image' => null,
                'meeting_time' => 'Tuesday, 6:00 PM',
                'location' => 'Prayer Room',
                'status' => 'open',
                'total_slots' => 30
            ],
            [
                'name' => 'Youth Ministry',
                'description' => 'Work with teenagers and young adults to help them grow in their faith through activities, mentoring, and Bible study. Perfect for those with a passion for youth development.',
                'image' => null,
                'meeting_time' => 'Friday, 6:30 PM',
                'location' => 'Youth Center',
                'status' => 'open',
                'total_slots' => 15
            ],
            [
                'name' => 'Children\'s Ministry',
                'description' => 'Help nurture the faith of our youngest members through age-appropriate activities, Bible stories, and creative learning experiences.',
                'image' => null,
                'meeting_time' => 'Sunday, 9:00 AM',
                'location' => 'Children\'s Hall',
                'status' => 'open',
                'total_slots' => 20
            ],
            [
                'name' => 'Community Outreach',
                'description' => 'Engage in various community service projects, including food drives, visiting the elderly, and organizing community events.',
                'image' => null,
                'meeting_time' => 'Saturday, 9:00 AM',
                'location' => 'Community Center',
                'status' => 'closed',
                'total_slots' => 40
            ],
            [
                'name' => 'Dance Ministry',
                'description' => 'Express worship through dance and movement. We welcome dancers of all skill levels who want to worship God through creative movement.',
                'image' => null,
                'meeting_time' => 'Thursday, 7:00 PM',
                'location' => 'Dance Studio',
                'status' => 'open',
                'total_slots' => 15
            ]
        ];

        foreach ($ministries as $ministry) {
            Ministry::create($ministry);
        }
    }
}