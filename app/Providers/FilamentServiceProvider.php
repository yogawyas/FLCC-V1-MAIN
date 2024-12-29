<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Navigation\UserMenuItem;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::auth(function () {
            return auth()->guard('admin');
        });
    
        // Menyesuaikan menu user
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()
                    ->label('Profil Saya')
                    ->url('/admin/profile')
                    ->icon('heroicon-s-user'),
    
                'logout' => UserMenuItem::make()
                    ->label('Keluar')
                    ->url('/admin/logout')
                    ->icon('heroicon-s-logout'),
            ]);
        });
    }
}
