<?php

// use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\NewsController;
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
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminNewsController;

// Autentikasi default Laravel
require __DIR__.'/auth.php';

// Tampilan awal
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Login dan logout pengguna biasa
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', function () {
    Auth::guard('web')->logout();
    return redirect('/login');
})->name('logout');

// if(!auth('web')->user() || !auth('web')->user()->isAdmin())

// Rute untuk dashboard pengguna biasa
Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth('web')->user() && auth('web')->user()->isAdmin()) return view('dashboard');
        else return redirect(route('welcome'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute lainnya
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/ministry', [MinistryController::class, 'index'])->name('ministry');
Route::get('/news', [NewsController::class, 'index'])->name('news');


//route discover more about us
Route::get('/about', [MoreaboutusController::class, 'index'])->name('about');





//ministry
Route::post('/ministry/{ministry}/join', [MinistryController::class, 'join'])->name('ministry.join');


Route::get('ministries/{ministry}/users', [MinistryController::class, 'users'])->name('ministries.users');

//edit ministry
Route::get('/ministries/{ministry}/edit', [MinistryController::class, 'edit'])->name('ministries.edit');

//edit ministry
Route::put('/ministries/{ministry}', [MinistryController::class, 'update'])->name('ministries.update');


// Tambahkan route untuk manage user
Route::get('/manage-user', [MinistryController::class, 'users'])->name('manage.user');
// Menghapus user dari ministry
Route::delete('/ministries/{ministry}/users/{user}', [MinistryController::class, 'removeUser'])
    ->name('ministries.users.remove');

//route create ministry
Route::get('/ministry/create', [MinistryController::class, 'create'])->name('ministry.create');
Route::post('/ministry/store', [MinistryController::class, 'store'])->name('ministry.store');



// Admin Dashboard
/*
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
    
});

// Rute login admin
Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store']);

*/