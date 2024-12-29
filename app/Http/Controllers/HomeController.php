<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(4)->get();
        return view('welcome', compact('news'));
    }

    public function news()
    {
        $allNews = News::latest()->paginate(12);
        $previousNews = News::latest()->paginate(12);
        return view('news.index', compact('allNews', 'previousNews'));
    }

    public function embeddedVideo()
    {
        return view('embedded-video');
    }

    public function about()
    {
        return view('about');
    }

    public function visionMission()
    {
        return view('vision-mission');
    }

    public function contact()
    {
        return view('contact');
    }
}