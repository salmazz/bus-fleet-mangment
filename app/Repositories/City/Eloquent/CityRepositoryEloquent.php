<?php

namespace App\Repositories\City\Eloquent;

use App\Models\City;
use App\Models\Customer;
use App\Repositories\Customer\CityRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CityRepositoryEloquent extends BaseRepository implements CityRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return City::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
