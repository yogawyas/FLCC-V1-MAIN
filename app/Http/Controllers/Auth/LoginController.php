<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi email dan password
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Redirect berdasarkan role
            if ($user->is_admin) {
                return redirect()->intended('/admin/dashboard'); // Untuk admin
            } else {
                return redirect()->intended('/dashboard'); // Untuk user biasa
            }
        }

        // Jika gagal login
        return redirect()->route('login')
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
