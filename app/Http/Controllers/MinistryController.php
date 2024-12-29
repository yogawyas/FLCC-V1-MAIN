<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Http\Request;

class MinistryController extends Controller
{
    public function index()
    {
        $ministries = Ministry::all();
        return view('ministry.index', compact('ministries'));
    }

    public function join(Request $request, Ministry $ministry)
    {
        // Add ministry registration logic here
        return back()->with('success', 'Successfully joined the ministry!');
    }
}