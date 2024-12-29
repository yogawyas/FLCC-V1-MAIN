<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index()
    {
        $totalNews = News::count();

        return view('admin.dashboard', compact('totalNews'));
    }

}
