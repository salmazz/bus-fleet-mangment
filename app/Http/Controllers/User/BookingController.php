<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\BookingSeatRequest;
use App\Http\Requests\Seat\SeatRequest;
use App\Services\BookingService;

class BookingController extends Controller
{
    public BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function availableSeats(SeatRequest $request)
    {
        $data = $this->bookingService->availableSeats($request->validated());
        return jsonResponse($data['message'], $data['data'], $data['code']);
    }

    /**
     * @param BookingSeatRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bookSeat(BookingSeatRequest $request){
        $data = $this->bookingService->bookSeat($request->validated() + ['user_id' => auth()->id()]);

        return jsonResponse($data['message'], $data['data'], $data['code']);
    }
}
