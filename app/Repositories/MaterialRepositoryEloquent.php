<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Material;

/**
 * Class MaterialRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MaterialRepositoryEloquent extends BaseRepository implements MaterialRepository
{
    public function model()
    {
        return Material::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    /**
     * getPaginate
     *
     * @param  mixed $data
     * @return void
     */
    public function getPaginate($data = [])
    {
        return $this->model->select([
                'materials.id',
                'name',
                'type',
                'unit',
                'amount',
                'quantity',
                'created_at'
            ])
            ->when(!empty($data['name']), function ($query) use ($data) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            })
            ->when(!empty($data['type']), function ($query) use ($data) {
                $query->where('type', $data['type']);
            })
            ->join('material_translates', 'materials.id', 'material_translates.material_id')
            ->where('language_code', app()->getLocale())
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
                    'materials.id',
                    'name',
                    'unit',
                    'type',
                    'amount',
                    'quantity',
                    'language_code'
                ])
                ->join('material_translates', 'materials.id', 'material_translates.material_id')
                ->where('material_translates.material_id', $id) 
                ->orderBy('language_code', 'desc')
                ->get();
    }
    
    /**
     * getDatas
     *
     * @return void
     */
    public function getDatas()
    {
        return $this->model->selectRaw('
                materials.id,
                amount as price,
                quantity,
                type,
                total_cost,
                GROUP_CONCAT(CASE WHEN language_code = "vi" THEN name END) as name,
                GROUP_CONCAT(CASE WHEN language_code = "en" THEN name END) as name_en,
                GROUP_CONCAT(CASE WHEN language_code = "vi" THEN unit END) as unit,
                GROUP_CONCAT(CASE WHEN language_code = "en" THEN unit END) as unit_en
            ')
            ->join('material_translates', 'material_translates.material_id', 'materials.id')
            ->groupBy('materials.id')
            ->get();
    }
}
