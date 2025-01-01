<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\MoreaboutusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminMinistriesController;
use App\Http\Controllers\Admin\AdminNewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Event;
use App\Models\Ministry;
use App\Models\News;

// Tampilan awal
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Login dan logout pengguna biasa
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', function () {
    Auth::guard('web')->logout();
    return redirect('/login');
})->name('logout');

// Rute untuk dashboard pengguna biasa
Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute login admin
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);

// Admin Dashboard
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        $totalUsers = User::count();
        $totalEvents = Event::count();
        $totalMinistries = Ministry::count();
        $totalNews = News::count();

        $stats = [
            'total_users' => $totalUsers,
            'total_events' => $totalEvents,
            'total_ministries' => $totalMinistries,
            'total_news' => $totalNews,
        ];

        return view('admin-dashboard', compact('stats'));
    })->name('admin-dashboard');

    // Rute logout untuk admin
    Route::post('/logout', function () {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    })->name('admin.logout');

    // CRUD Events for Admin
    Route::get('/events', [AdminEventController::class, 'index'])->name('admin-events');
    Route::get('/events/create', [AdminEventController::class, 'create'])->name('admin-events.create');
    Route::post('/events', [AdminEventController::class, 'store'])->name('admin-events.store');
    Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])->name('admin-events.edit');
    Route::put('/events/{event}', [AdminEventController::class, 'update'])->name('admin-events.update');
    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('admin-events.destroy');

    // Rute lain di bawah admin
    Route::get('/about', function () {
        return view('admin.about'); // Ganti dengan view tentang admin
    })->name('admin.about');
});

// CRUD Events for Regular Users
Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
});

// Rute lainnya untuk pengguna biasa
Route::get('/ministry', [MinistryController::class, 'index'])->name('ministry');
Route::get('/news', [EventController::class, 'index'])->name('news');
Route::get('/about', function () {
    return view('about');
})->name('about');

// Autentikasi default Laravel
require __DIR__.'/auth.php';