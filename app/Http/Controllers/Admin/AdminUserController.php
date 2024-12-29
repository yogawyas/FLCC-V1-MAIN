<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalUsers'));
    }
}
