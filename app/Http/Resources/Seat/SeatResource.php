<?php

namespace App\Http\Resources\Seat;

use App\Http\Resources\Bus\BusResource;
use App\Http\Resources\City\CityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    public $trip;

    public function __construct($resource, $trip = null)
    {
        parent::__construct($resource);
        $this->trip = $trip;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'bus' => new BusResource($this->whenLoaded('bus')),
            'seat_number' => $this->seat_number,
            'is_available' => $this->is_available,
            'trip' => [
                'origin_city' => new CityResource($this->trip->originCity),
                'destination_city' => new CityResource($this->trip->destinationCity),
                'date' => $this->trip->date->format('Y-m-d'),
            ],
        ];
    }
}
