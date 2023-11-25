<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['origin_city_id', 'destination_city_id', 'bus_id', 'date'];

    protected $casts = [
        'date' => 'date'
    ];


    public function originCity()
    {
        return $this->belongsTo(City::class, 'origin_city_id');
    }

    public function destinationCity()
    {
        return $this->belongsTo(City::class, 'destination_city_id');
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }
}


