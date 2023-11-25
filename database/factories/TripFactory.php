<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\City;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    protected $model = Trip::class;

    public function definition()
    {
        return [
            'origin_city_id' => function () {
                return City::factory()->create()->id;
            },
            'destination_city_id' => function () {
                return City::factory()->create()->id;
            },
            'bus_id' => function () {
                return Bus::factory()->create()->id;
            },
            'date' => $this->faker->date
        ];
    }
}
