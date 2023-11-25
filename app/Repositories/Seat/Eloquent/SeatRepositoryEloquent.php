<?php

namespace App\Repositories\Seat\Eloquent;

use App\Models\Seat;
use App\Repositories\Seat\SeatRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SeatRepositoryEloquent extends BaseRepository implements SeatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Seat::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
