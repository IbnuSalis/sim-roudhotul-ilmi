<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Set locale untuk Carbon (tanggal bahasa Indonesia)
        Carbon::setLocale('id');

        // Force HTTPS di production
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
