<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;
use App\Models\Event;
use App\Models\News;

class MoreaboutusController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $ministries = Ministry::all();
        $news = News::all();
        // Jika Anda ingin menambahkan konten dinamis, misalnya data dari database
        // $events = Event::all(); // Misal jika Anda memiliki model Event
        return view('about',compact(['ministries','news','events'])); // Kembali ke halaman about
    }
}

