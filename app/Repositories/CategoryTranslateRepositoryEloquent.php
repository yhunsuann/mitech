<?php

namespace App\Repositories;

use App\Models\CategoryTranslate;
use App\Repositories\CategoryTranslateRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class CategoryTranslateRepositoryEloquent extends BaseRepository implements CategoryTranslateRepository
{    
    public function model()
    {
        return CategoryTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
