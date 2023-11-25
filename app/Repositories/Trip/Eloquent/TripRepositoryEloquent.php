<?php

namespace App\Repositories\Trip\Eloquent;

use App\Models\Trip;
use App\Repositories\Trip\TripRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TripRepositoryEloquent extends BaseRepository implements TripRepository
{
    protected $fieldSearchable = ['origin_city_id', 'destination_city_id', 'bus_id', 'date'];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Trip::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
