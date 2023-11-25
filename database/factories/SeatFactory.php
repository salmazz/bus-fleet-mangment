<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Seat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    protected $model = Seat::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bus_id' => function () {
                return Bus::factory()->create()->id;
            },
            'seat_number' => $this->faker->unique()->numberBetween(1, 50), // Unique seat numbers
            'is_available' => $this->faker->boolean(80) // 80% chance of being true
        ];
    }
}
