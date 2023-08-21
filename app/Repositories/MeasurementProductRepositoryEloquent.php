<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\MeasurementProduct;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MeasurementProductRepositoryEloquent extends BaseRepository implements MeasurementProductRepository
{
    public function model()
    {
        return MeasurementProduct::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

