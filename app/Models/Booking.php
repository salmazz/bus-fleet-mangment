<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['trip_id', 'seat_id', 'user_id', 'origin_city_id', 'destination_city_id'];

    // Relationships
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function originCity()
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    // Scopes
    public function scopeOfDate($query, $date)
    {
        return $query->whereHas('trip', function ($q) use ($date) {
            $q->whereDate('date', $date);
        });
    }

    public function scopeOfUserId($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeOfTripId($query, $tripId)
    {
        return $query->where('trip_id', $tripId);
    }

    public function scopeOfOriginCityId($query, $originCityId)
    {
        return $query->whereHas('originCity', function ($q) use ($originCityId) {
            $q->where('id', $originCityId);
        });
    }

    public function scopeOfDestinationCityId($query, $destinationCityId)
    {
        return $query->whereHas('destinationCity', function ($q) use ($destinationCityId) {
            $q->where('id', $destinationCityId);
        });
    }
}
