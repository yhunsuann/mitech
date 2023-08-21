<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Library;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LibraryRepositoryEloquent extends BaseRepository implements LibraryRepository
{    
    /**
     * model
     *
     * @return void
     */
    public function model()
    {
        return Library::class;
    }
    
    /**
     * boot
     *
     * @return void
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
        
    /**
     * getList
     *
     * @param  mixed $data
     * @return void
     */
    public function getList($data)
    {
        $keyword = $data['keyword'] ?? null;
        $type = $data['type'] ?? null;

        return $this->model->select([
                    'libraries.id',
                    'name',
                    'type',
                    'avatar',
                    'created_at',
                    'slug'
                ])
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                ->when(!empty($data['search']), function ($query) use ($data) {
                    $query->where('name', 'like', '%' . $data['search'] . '%');
                })
                ->when(!empty($type), function ($query) use ($type) {
                    $query->where('type', $type);
                })
                ->join('library_translates', 'libraries.id', 'library_translates.library_id')
                ->where('language_code', app()->getLocale())
                ->orderBy('created_at', 'desc')
                ->paginate(config('constants.paginate'));
    }
    
    /**
     * getInfoById
     *
     * @param  mixed $id
     * @return void
     */
    public function getInfoById(int $id)
    {
        return $this->model->select([
                    'libraries.id',
                    'name',
                    'type',
                    'avatar',
                    'images',
                    'language_code',
                    'status'
                ])
                ->join('library_translates', 'libraries.id', 'library_translates.library_id')
                ->where('library_translates.library_id', $id) 
                ->orderBy('language_code', 'desc')
                ->get();
    }
    
    /**
     * getInfoBySlug
     *
     * @param  mixed $lug
     * @return void
     */
    public function getInfoBySlug($lug)
    {
        return $this->model->select([
                'libraries.id',
                'name',
                'type',
                'avatar',
                'images',
                'status'
            ])
            ->join('library_translates', 'libraries.id', 'library_translates.library_id')
            ->where('library_translates.slug', $lug) 
            ->get();
    }
        
    /**
     * getListApi
     *
     * @param  mixed $data
     * @return void
     */
    public function getListApi($data)
    {
        $name = $data['tech-1'] ?? null;
        $type = $data['tech-2'] ?? null;

        $data =  $this->model->select([
                        'libraries.id',
                        'name',
                        'type',
                        'avatar',
                        'created_at',
                        'slug'
                    ])
                    ->when(!empty($name), function ($query) use ($name) {
                        $query->where('name', 'like', '%' . $name . '%');
                    })
                    ->when(!empty($type), function ($query) use ($type) {
                        $query->where('type', $type);
                    })
                    ->join('library_translates', 'libraries.id', 'library_translates.library_id')
                    ->where('language_code', app()->getLocale())
                    ->paginate(config('constants.paginate'));
                    
    }

    public function getType()
    {
        return $this->model
                ->select('library_translates.name')
                ->join('library_translates', 'libraries.id', 'library_translates.library_id')
                ->where('language_code', app()->getLocale())
                ->groupBy('library_translates.name')
                ->get();
    }
}
