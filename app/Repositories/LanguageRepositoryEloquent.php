<?php

namespace App\Repositories;

use App\Models\Language;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class LanguageRepositoryEloquent extends BaseRepository implements LanguageRepository
{
    public function model()
    {
        return Language::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    /**
     * listLanguageRecruitment
     *
     * @return void
     */
    public function listLanguage()
    {
        return  $this->model->orderBy('language_code','desc')->get();
    }
}    
