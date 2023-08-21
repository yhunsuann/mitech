<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Slider;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SliderRepositoryEloquent extends BaseRepository implements SliderRepository
{    
    /**
     * model
     *
     * @return void
     */
    public function model()
    {
        return Slider::class;
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
                    'sliders.id',
                    'name',
                    'file',
                    'created_at',
                    'link'
                ])
                ->join('slider_translates', 'sliders.id', 'slider_translates.slider_id')
                ->when(!empty($data['keyword']), function ($query) use ($data) {
                    $query->where('name', 'like', '%' . $data['keyword'] . '%');
                })
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
        return $this->model
                ->select([
                    'sliders.id',
                    'name',
                    'file',
                    'created_at',
                    'link',
                    'status'
                ])
                ->join('slider_translates', 'sliders.id', 'slider_translates.slider_id')
                ->where('slider_translates.slider_id', $id) 
                ->orderBy('language_code', 'desc')
                ->get();
    }
    
    /**
     * getInfoBySlug
     *
     * @return void
     */
    public function getAll()
    {
        return $this->model
            ->select([
                'file',
                'link'
            ])
            ->join('slider_translates', 'sliders.id', 'slider_translates.slider_id')
            ->where('language_code', app()->getLocale()) 
            ->get();
    }
}
