<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\MaterialTranslate;

/**
 * Class MaterialTranslateRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MaterialTranslateRepositoryEloquent extends BaseRepository implements MaterialTranslateRepository
{
    public function model()
    {
        return MaterialTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
