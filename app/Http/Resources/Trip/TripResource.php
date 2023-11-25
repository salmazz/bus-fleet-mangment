<?php

namespace App\Http\Resources\Trip;

use App\Http\Resources\Bus\BusResource;
use App\Http\Resources\City\CityResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "origin_city" => new CityResource($this->whenLoaded('originCity')),
            "destination_city" => new CityResource($this->whenLoaded('destinationCity')),
            'bus' => new BusResource($this->whenLoaded('bus')),
            'date' => Carbon::parse($this->date)->format('Y-m-d'),
        ];
    }
}
