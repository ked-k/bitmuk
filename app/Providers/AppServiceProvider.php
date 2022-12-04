<?php

namespace App\Providers;

use Artisan;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Stevebauman\Location\Facades\Location;
use Storage;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $ip = \Request::ip() == '127.0.0.1' ? '103.77.188.207' : \Request::ip();

        if (Location::get($ip)){
            $timezone = Location::get($ip)->timezone;
            config()->set('app.timezone', $timezone);
        }

        Paginator::useBootstrap();

        $emailVerification = setting_get('email_verification');

        if ($emailVerification == false) {
            DB::table('users')->whereNull('email_verified_at')->update(['email_verified_at' => now()]);
        }



        $isExists = Storage::disk('root')->exists('installed');
        if (!$isExists) {
            Artisan::call('view:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('cache:clear');
        }


    }
}
