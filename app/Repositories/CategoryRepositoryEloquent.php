<?php

namespace App\Repositories;

use App\Repositories\CategoryRepository;
use App\Models\Category;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{    
    public function model()
    {
        return Category::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
        
    /**
     * category
     *
     * @param  mixed $data
     * @return void
     */
   public function allCategories($data = [], $type = [])
   {
       $status = $data['status'] ?? null;
       $keyword = $data['name'] ?? null;

       return $this->model
                ->select([
                    'categories.*',
                    'category_translates.name_category',
                    'category_translates.description',
                    'categories.type'
                ])
                ->join('category_translates', 'categories.id', '=', 'category_translates.category_id')
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    $query->where('category_translates.name_category', 'like', '%' . $keyword . '%');
                })
                ->when(!empty($status), function ($query) use ($status) {
                    $query->where('categories.status', $status);
                })
                ->where('type', $type)
                ->where('category_translates.language_code', app()->getLocale())
                ->orderBy('created_at', 'desc')
                ->paginate(config('constants.paginate'));
   }
    
    /**
     * getCategories
     *
     * @param  mixed $data
     * @return void
     */
    public function getCategories($data = [])
    {
        return $this->model
                    ->select([
                        'categories.*',
                        'category_translates.name_category', 
                        'measurement_products.thickness', 
                        'measurement_products.price' 
                    ])
                    ->join('category_translates', 'products.id', 'category_translates.product_id')
                    ->join('measurement_products', 'products.id', 'measurement_products.product_id')
                    ->where('status', 'active')
                    ->where('language_code', app()->getLocale())
                    ->get();
    }

    /**
     * Product
     *
     * @param  mixed $data
     * @return void
     */
    public function getInfoById(int $id)
    {
        return $this->model
                ->select([
                    'categories.*',
                    'category_translates.name_product', 
                    'measurement_products.thickness', 
                    'measurement_products.price', 
                ])
                ->join('category_translates', 'products.id', 'product_translates.product_id')
                ->join('measurement_products', 'products.id', 'measurement_products.product_id')
                ->where('categories.id', $id) 
                ->where('status', 'active')
                ->where('language_code', app()->getLocale())
                ->first();
    }

    public function getInfoByIdCategory(int $id)
    {
        return $this->model
                ->select([
                    'categories.*',
                    'category_translates.*', 
                ])
                ->join('category_translates', 'categories.id', 'category_translates.category_id')
                ->where('category_translates.category_id', $id) 
                ->orderBy('language_code', 'desc')
                ->get();
    }

    public function getCategoriesDefault($type = 'product')
    { 
        return $this->model
                ->select([
                    'categories.*',
                    'category_translates.name_category',
                    'category_translates.description',
                    'categories.type'
                ])
                ->join('category_translates', 'categories.id', '=', 'category_translates.category_id')
                ->where('type', $type)
                ->where('category_translates.language_code','en')
                ->paginate(config('constants.paginate'));
    }
    
    /**
     * getList
     *
     * @param  mixed $data
     * @return void
     */
    public function getList($data = [])
    {
        return $this->model
            ->select([
                'category_translates.name_category as name',
                'categories.id'
            ])
            ->join('category_translates', 'categories.id', '=', 'category_translates.category_id')
            ->where('language_code', app()->getLocale())
            ->when(!empty($data['type']), function ($query) use ($data) {
                $query->where('type', $data['type']);
            })
            ->get();
    }
}
