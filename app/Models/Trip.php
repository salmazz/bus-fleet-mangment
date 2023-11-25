<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['origin_city_id', 'destination_city_id', 'bus_id', 'date'];


    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    protected $casts = [
        'date' => 'date'
    ];
}
