<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Trip\TripCollection;
use App\Services\TripService;
use Symfony\Component\HttpFoundation\Response;

class TripController extends Controller
{
    private TripService $tripService;

    public function __construct(TripService $tripService)
    {
        $this->tripService = $tripService;
    }

    public function index(){
        $items = $this->tripService->list();

        return jsonResponse('Trips List', ['trips' => new TripCollection($items)], Response::HTTP_OK);
    }
}
