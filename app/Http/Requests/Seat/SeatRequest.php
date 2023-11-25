<?php

namespace App\Http\Requests\Seat;

use Illuminate\Foundation\Http\FormRequest;

class SeatRequest extends FormRequest
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
            'origin_city_id' => 'required|exists:cities,id',
            'destination_city_id' => 'required|exists:cities,id',
            'date' => 'required|date',
        ];
    }
}
