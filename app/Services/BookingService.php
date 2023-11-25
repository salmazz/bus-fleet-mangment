<?php

namespace App\Services;

use App\Http\Resources\Booking\BookingCollection;
use App\Http\Resources\Booking\BookingResource;
use App\Http\Resources\Seat\SeatResource;
use App\Repositories\Booking\BookingRepository;
use App\Repositories\Seat\SeatRepository;
use App\Repositories\Trip\TripRepository;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Request;

class BookingService
{
    public BookingRepository $bookingRepository;
    public SeatRepository $seatRepository;
    public TripRepository $tripRepository;

    public function __construct(BookingRepository $bookingRepository, SeatRepository $seatRepository, TripRepository $tripRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->seatRepository = $seatRepository;
        $this->tripRepository = $tripRepository;
    }

    public function list(){

        $query = $this->bookingRepository->with(['trip', 'user', 'originCity', 'destinationCity']);

        $bookings = $query->get();
        return [
            'message' => 'Booking List.',
            'data' => ["booking" => new BookingCollection($bookings)],
            'code' => Response::HTTP_OK
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function bookSeat($request)
    {
        DB::beginTransaction();

        try {
            // Check seat availability within the transaction and apply a lock
            if (!$this->isSeatAvailableWithLock($request)) {
                DB::rollBack();
                return [
                    'message' => 'Seat is not available',
                    'data' => [],
                    'code' => Response::HTTP_CONFLICT
                ];
            }

            // Create the booking
            $booking = $this->bookingRepository->create($request);
            DB::commit();

            return [
                'message' => 'Booking created successfully.',
                'data' => ["booking" => new BookingResource($booking)],
                'code' => Response::HTTP_OK
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'message' => 'Booking failed. Rollback performed.',
                'data' => [$e->getMessage()],
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR
            ];
        }
    }

    private function isSeatAvailableWithLock($request)
    {
        $conflictingBooking = $this->bookingRepository->where('trip_id', $request['trip_id'])
            ->where('seat_id', $request['seat_id'])
            ->lockForUpdate() // Pessimistic locking
            ->first();

        return is_null($conflictingBooking);
    }

    /**
     * @param $request
     * @return array
     */
    public function availableSeats($request)
    {
        $trip = $this->tripRepository->where('origin_city_id', $request['origin_city_id'])
            ->where('destination_city_id', $request['destination_city_id'])
            ->whereDate('date', $request['date'])
            ->with(['bus.seats']) // Eager load bus and seats
            ->first();

        if (!$trip) {
            return [
                'message' => 'No trip found.',
                'data' => [],
                'code' => Response::HTTP_NOT_FOUND
            ];
        }

        // Get all seats for the bus
        $seats = $trip->bus->seats;

        // Check each seat for availability
        $availableSeats = $seats->reject(function ($seat) use ($trip) {
            // Check if seat is booked for this trip
            return $seat->bookings()->where('trip_id', $trip->id)->exists();
        });

        // Map available seats to SeatResource
        $availableSeatResources = $availableSeats->map(function ($seat) use ($trip) {
            return new SeatResource($seat, $trip);
        });

        return [
            'message' => 'Available seats.',
            'data' => ['available_seats' => $availableSeatResources],
            'code' => Response::HTTP_OK
        ];
    }
}
