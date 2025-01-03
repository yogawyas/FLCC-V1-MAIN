<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $featuredNews = News::where('is_featured', TRUE)
            ->get();

        $allNews = News::all();

        return view('news.public-index', compact('allNews'));
    }

    // public function show(News $news)
    // {
    //     return view('events.show', compact('event'));
    // }
}