<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\RedirectResponse; // <-- Tambahkan ini
use Illuminate\Support\Facades\Auth;   // <-- Tambahkan ini

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Tambahkan kode ini
        RedirectResponse::macro('intended', function ($default = '/', $status = 302, $headers = []) {
            $path = session()->pull('url.intended', $default);

            if (Auth::check() && Auth::user()->role === 'admin') {
                // Jika role adalah admin, arahkan ke dashboard admin
                return redirect()->to('/admin/dashboard', $status, $headers);
            }

            return redirect()->to($path, $status, $headers);
        });
    }
}