<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoreaboutusController extends Controller
{
    public function index()
    {
        // Jika Anda ingin menambahkan konten dinamis, misalnya data dari database
        // $events = Event::all(); // Misal jika Anda memiliki model Event
        return view('about'); // Kembali ke halaman about
    }
}
