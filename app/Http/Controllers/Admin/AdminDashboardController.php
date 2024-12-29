<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Ministry;
use App\Models\News;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_events' => Event::count(),
            'total_ministries' => Ministry::count(),
            'total_news' => News::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
