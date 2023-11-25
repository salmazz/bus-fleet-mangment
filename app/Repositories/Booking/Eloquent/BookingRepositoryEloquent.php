<?php

namespace App\Repositories\Booking\Eloquent;

use App\Models\Booking;
use App\Repositories\Booking\BookingRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BookingRepositoryEloquent extends BaseRepository implements BookingRepository
{
    /**
     * @var string[]
     */
    protected $fieldSearchable = ['trip_id', 'seat_id', 'user_id', 'origin_city_id', 'destination_city_id'];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Booking::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
