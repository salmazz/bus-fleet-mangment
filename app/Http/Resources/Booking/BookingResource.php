<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'trip_id' => $this->trip_id,
            'seat_id' => $this->seat_id,
            'user_id' => $this->user_id,
            'origin_city_id' => $this->origin_city_id,
            'destination_city_id' => $this->destination_city_id,
        ];
    }
}
