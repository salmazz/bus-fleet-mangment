<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\City;
use App\Models\Seat;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trip_id' => function(){ return Trip::factory()->create();}, // Adjust according to your trips range
            'seat_id' => function(){ return Seat::factory()->create();}, // Adjust according to your trips range
            'user_id' => function(){ return User::factory()->create();}, // Adjust according to your trips range
            'origin_city_id' => function(){ return City::factory()->create();}, // Adjust according to your trips range
            'destination_city_id' => function(){ return City::factory()->create();}

        ];
    }
}
