<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\LibraryTranslate;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LibraryTranslateRepositoryEloquent extends BaseRepository implements LibraryTranslateRepository
{
    public function model()
    {
        return LibraryTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
