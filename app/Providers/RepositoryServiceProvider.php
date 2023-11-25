<?php

namespace App\Providers;

use App\Models\Booking;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\Eloquent\BookingRepositoryEloquent;
use App\Repositories\Bus\BusRepository;
use App\Repositories\Bus\Eloquent\BusRepositoryEloquent;
use App\Repositories\City\CityRepository;
use App\Repositories\City\Eloquent\CityRepositoryEloquent;
use App\Repositories\Seat\Eloquent\SeatRepositoryEloquent;
use App\Repositories\Seat\SeatRepository;
use App\Repositories\Trip\Eloquent\TripRepositoryEloquent;
use App\Repositories\Trip\TripRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        // Bus Repository
        $this->app->bind(BusRepository::class,
            BusRepositoryEloquent::class);

        // Bus Repository
        $this->app->bind(CityRepository::class,
            CityRepositoryEloquent::class);

        // Seat Repository
        $this->app->bind(SeatRepository::class,
            SeatRepositoryEloquent::class);

        // Trip Repository
        $this->app->bind(TripRepository::class,
            TripRepositoryEloquent::class);

        // Booking Repository
        $this->app->bind(BookingRepository::class, BookingRepositoryEloquent::class);
    }
}
