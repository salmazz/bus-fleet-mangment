<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Illuminate\Support\Facades\Request;

class BookingController extends Controller
{
    /**
     * @var BookingService
     */
    public BookingService $bookingService;

    /**
     * @param BookingService $bookingService
     */
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request){
        $data =  $this->bookingService->list($request);
        return jsonResponse($data['message'], $data['data'], $data['code']);
    }
}
