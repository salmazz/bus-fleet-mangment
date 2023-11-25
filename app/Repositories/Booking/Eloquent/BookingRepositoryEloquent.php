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
