<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $news = News::where('is_featured', TRUE)->get();
        return view('welcome', compact(['news'])); // Mengarahkan ke welcome.blade.php
    }
}
