<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Rooms;

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
        \Carbon\Carbon::setLocale('tr');

        View::composer('*', function ($view) {
            $roomsForHeader = Rooms::where('status', 1)->get();
            $view->with('roomsForHeader', $roomsForHeader);
        });
    }
}
