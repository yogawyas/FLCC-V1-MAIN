<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Console\Scheduling\Schedule;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     */
    protected $routeMiddleware = [
        // Middleware lain
        'redirectIfAuthenticated' => \App\Http\Middleware\RedirectIfAuthenticated::class,

        // Tambahkan middleware admin
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    protected function schedule(Schedule $schedule)
{
    // Menjadwalkan command untuk dijalankan setiap jam
    $schedule->command('events:check-schedule')->hourly();
}

}
