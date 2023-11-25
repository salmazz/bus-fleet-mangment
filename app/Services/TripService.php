<?php

namespace App\Services;

use App\Repositories\Trip\TripRepository;

class TripService
{
    public TripRepository $tripRepository;

    public function __construct(TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
    }

    public function list(){
        return $this->tripRepository->with(['originCity', 'destinationCity', 'bus'])->get();
    }
}
