<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\CheckIn;
use App\Models\CheckOut;
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
        $bookings = Booking::all();
        $checkIns = CheckIn::all();
        View::share('bookings', $bookings);
        View::share('checkIns', $checkIns);
    }
}
