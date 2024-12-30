<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
    ]);

    $credentials = $request->only('email', 'password');

    // Menggunakan auth('admin') untuk login admin
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Cek apakah user adalah admin
        if (Auth::user()->is_admin == true) {
            return redirect()->route('admin/dashboard'); // Admin Dashboard
        }

        // Untuk user biasa
        return redirect()->route('welcome');
    }

    // Jika login gagal
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
