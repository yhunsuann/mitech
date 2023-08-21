<?php

namespace App\Repositories;

use App\Models\ProductTranslate;
use App\Repositories\ProductTranslateRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class ProductTranslateRepositoryEloquent extends BaseRepository implements ProductTranslateRepository
{    
    public function model()
    {
        return ProductTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
