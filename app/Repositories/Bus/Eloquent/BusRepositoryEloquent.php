<?php

namespace App\Repositories\Bus\Eloquent;

use App\Models\Bus;
use App\Repositories\Bus\BusRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TestRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BusRepositoryEloquent extends BaseRepository implements BusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bus::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
