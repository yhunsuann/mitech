<?php

namespace App\Repositories;

use App\Models\FAQTranslate;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class FAQTranslateRepositoryEloquent extends BaseRepository implements FAQTranslateRepository
{
    public function model()
    {
        return FAQTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}    
