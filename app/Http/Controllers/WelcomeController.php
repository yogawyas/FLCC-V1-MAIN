<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class WelcomeController extends Controller
{
    // app/Http/Controllers/WelcomeController.php
    public function index()
    {
        $news = News::latest()
            ->take(5)
            ->get();

        return view('welcome', compact('news'));
    }
}
