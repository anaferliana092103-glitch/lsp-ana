<?php

namespace App\Providers;

use App\Models\CompanyProfile;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        try {
            View::share('settings', WebsiteSetting::asArray());
            View::share('company', CompanyProfile::current());
        } catch (\Throwable $e) {
            report($e);

            View::share('settings', []);
            View::share('company', new CompanyProfile([
                'name' => 'PT. Koneksi Net Nusantara',
                'tagline' => 'Solusi Keamanan & Teknologi Terpercaya',
            ]));
        }
    }
}
