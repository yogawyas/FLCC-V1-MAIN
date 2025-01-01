<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Menampilkan form login untuk user biasa atau admin
     */
    public function create(Request $request)
    {
        // Tentukan view berdasarkan rute
        $isAdminRoute = $request->is('admin/*');
        return view($isAdminRoute ? 'auth.admin.login' : 'auth.login');
    }

    /**
     * Memproses login
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $guard = $request->is('admin/*') ? 'admin' : 'web';

        if (Auth::guard($guard)->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended($guard === 'admin' ? '/admin/dashboard' : '/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Memproses logout
     */
    public function destroy(Request $request)
    {
        $guard = Auth::guard('admin')->check() ? 'admin' : 'web';

        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect($guard === 'admin' ? '/admin/login' : '/login');
    }
}
