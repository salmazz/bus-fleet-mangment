<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingSeatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'trip_id' => 'required|exists:trips,id',
            'seat_id' => 'required|exists:seats,id',
            'user_id' => 'required|exists:users,id',
            'start_city_id' => 'required|exists:cities,id',
            'end_city_id' => 'required|exists:cities,id'
        ];
    }
}
