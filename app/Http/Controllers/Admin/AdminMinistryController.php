<?php

namespace App\Http\Controllers;
use App\Models\Ministry;

use Illuminate\Http\Request;

class AdminMinistryController extends Controller
{
    public function index()
    {
        $totalMinistries = Ministry::count();

        return view('admin.dashboard', compact('totalMinistries'));
    }
}
