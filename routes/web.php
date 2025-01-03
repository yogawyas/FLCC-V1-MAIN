<?php

// use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\MinistryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MoreaboutusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;

use App\Models\User;
use App\Models\Event;
use App\Models\Ministry;
use App\Models\News;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminUserController;


// Autentikasi default Laravel
require __DIR__ . '/auth.php';

// Tampilan awal
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Login dan logout pengguna biasa
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', function () {
    Auth::guard('web')->logout();
    return redirect('/');
})->name('logout');

// if(!auth('web')->user() || !auth('web')->user()->isAdmin())

// Rute untuk dashboard pengguna biasa


Route::get('/dashboard', function () {
    if (auth('web')->user() && auth('web')->user()->isAdmin())
        return view('dashboard');
    else
        return redirect(route('welcome'));
})->name('dashboard');

// Rute lainnya
Route::get('/events', [EventController::class, 'index'])->name('events');

Route::get('/ministry', [MinistryController::class, 'index'])->name('ministry');

// Public news route
Route::get('/news', [NewsController::class, 'index'])->name('news');

//route discover more about us
Route::get('/about', [MoreaboutusController::class, 'index'])->name('about');


Route::middleware(['auth:web', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //ministry
    Route::post('/ministry/{ministry}/join', [MinistryController::class, 'join'])->name('ministry.join');

});


Route::middleware(['auth:web', IsAdmin::class])->group(function () {
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
    Route::get('/admin/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [AdminNewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{news}', [AdminNewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');

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
});