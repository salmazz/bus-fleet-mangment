<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['total_seats'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
