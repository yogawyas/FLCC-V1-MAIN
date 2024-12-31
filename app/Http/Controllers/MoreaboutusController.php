<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;

class MoreaboutusController extends Controller
{
    public function index()
    {
        $ministries = Ministry::all();
        // Jika Anda ingin menambahkan konten dinamis, misalnya data dari database
        // $events = Event::all(); // Misal jika Anda memiliki model Event
        return view('about',compact('ministries')); // Kembali ke halaman about
    }
}

