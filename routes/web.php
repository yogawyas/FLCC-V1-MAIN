<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\MoreaboutusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Event;
use App\Models\Ministry;
use App\Models\News;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminMinistriesController;
use App\Http\Controllers\Admin\AdminNewsController;

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
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        if (auth('admin')->user()->is_admin) {
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

            return view('admin.dashboard', compact('stats'));
        }

        abort(403, 'This action is unauthorized.');
    })->name('admin.dashboard');

    // Rute logout untuk admin
    Route::post('/logout', function () {
        auth('admin')->logout();
        return redirect('/admin/login');
    })->name('admin.logout');

    //route more about us
    Route::get('/about', function () {
        return view('about'); // Ganti 'about' dengan view yang sesuai
    })->name('about');
    


    // CRUD event
    Route::get('/events', [AdminEventController::class, 'index'])->name('admin.events.index');
    Route::get('/events/create', [AdminEventController::class, 'create'])->name('admin.events.create');
    Route::post('/events', [AdminEventController::class, 'store'])->name('admin.events.store');
    Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/events/{event}', [AdminEventController::class, 'update'])->name('admin.events.update');
    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('admin.events.destroy');
});

// Rute lainnya
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/ministry', [MinistryController::class, 'index'])->name('ministry');
Route::get('/news', [EventController::class, 'index'])->name('news');
// Route::get('/about', function () {
//     return view('about');
// })->name('about');
Route::get('/about', [MoreaboutusController::class, 'index'])->name('about');
 //route more about us yang baru
//  Route::get('/about', function () {
//     return view('about'); // Sesuaikan dengan nama view
// })->name('about');


// Autentikasi default Laravel
require __DIR__.'/auth.php';

Route::post('/ministry/{ministry}/join', [MinistryController::class, 'join'])->name('ministry.join');