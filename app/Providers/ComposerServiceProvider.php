<?php

namespace App\Providers;

use App\Http\ViewComposers\DashBoardComposer;
use App\Http\ViewComposers\MenuComposer;
use App\Http\ViewComposers\SettingsComposer;
use App\Http\ViewComposers\TicketsComposer;
use App\Http\ViewComposers\UserComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('backend.ticket.index', TicketsComposer::class);
        view()->composer([
            'frontend*',
        ], SettingsComposer::class);
        view()->composer([
            'frontend*'
        ], UserComposer::class);

        view()->composer([
            'frontend.layouts.app'
        ], MenuComposer::class);

        view()->composer([
            'frontend.user.dashboard',
            'frontend.merchant.dashboard',
        ], DashBoardComposer::class);
    }
}
