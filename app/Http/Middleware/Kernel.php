<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

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
}
