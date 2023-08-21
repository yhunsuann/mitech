<?php

namespace App\Repositories;

use App\Repositories\ProductRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Product;

class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{        
    /**
     * model
     *
     * @return void
     */
    public function model()
    {
        return Product::class;
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
     * allRegisterProducts
     *
     * @param  mixed $data
     * @return void
     */
    public function allRegisterProducts($data = [])
    {
        $status = $data['status'] ?? null;
        $keyword = $data['name'] ?? null;
    
        return $this->model
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                ->when(!empty($status), function ($query) use ($status) {
                    $query->where('status', $status);
                })
                ->orderBy('created_at', 'asc')
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
        $name = $data['name'] ?? null;
        $category = $data['category'] ?? null;

        return $this->model
                ->selectRaw(
                    'products.id,
                    MIN(measurement_products.price) AS price,
                    MAX(product_translates.name) AS name,
                    MAX(category_translates.name_category) AS name_category,
                    MAX(avatar) AS avatar,
                    MAX(product_translates.slug) AS slug,
                    MAX(thickness) AS thickness,
                    MAX(thickness_unit) AS thickness_unit,
                    MAX(products.created_at) AS created_at'
                )
                ->with('measurementProduct')
                ->join('product_translates', 'products.id', 'product_translates.product_id')
                ->join('categories', 'products.category_id', 'categories.id')
                ->join('category_translates', 'categories.id', 'category_translates.category_id')
                ->join('measurement_products', 'products.id', 'measurement_products.product_id')
                ->when(!empty($name), function ($query) use ($name) {
                    $query->where('name', 'like', '%' . $name . '%');
                })
                ->when(!empty($category), function ($query) use ($category) {
                    $query->where('name_category', $category);
                })
                ->where('product_translates.language_code', app()->getLocale())
                ->where('category_translates.language_code', app()->getLocale())
                ->orderBy('created_at', 'desc')
                ->orderBy('products.id')
                ->groupByRaw('products.id')
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
                    'products.id',
                    'product_translates.name',
                    'products.category_id',
                    'product_translates.description',
                    'product_translates.content',
                    'products.image',
                    'avatar',
                    'language_code',
                    'status'
                ])
                ->join('product_translates', 'products.id', 'product_translates.product_id')
                ->where('product_translates.product_id', $id) 
                ->get();
    }
    
    /**
     * getInfoBySlug
     *
     * @param  mixed $slug
     * @return void
     */
    public function getInfoBySlug($slug)
    {
        return $this->model
                ->select([
                    'products.id',
                    'product_translates.name',
                    'product_translates.description',
                    'product_translates.content',
                    'products.category_id',
                    'products.image',
                    'avatar',
                    'language_code',
                    'status'
                ])
                ->join('product_translates', 'products.id', 'product_translates.product_id')
                ->where('product_translates.slug', $slug) 
                ->where('product_translates.language_code', app()->getLocale())
                ->get();
    }
    
    /**
     * getListByMutipleId
     *
     * @param  mixed $ids
     * @return void
     */
    public function getListByMutipleIds($ids = [])
    {
        return $this->selectRaw('
                products.id,
                MIN(measurement_products.price) AS price,
                MAX(product_translates.name) AS name,
                MAX(category_translates.name_category) AS name_category,
                MAX(avatar) AS avatar,
                MAX(product_translates.slug) AS slug,
                MAX(thickness) AS thickness,
                MAX(thickness_unit) AS thickness_unit,
                MAX(products.created_at) AS created_at
            ')
            ->with('measurementProduct')
            ->join('product_translates', 'products.id', 'product_translates.product_id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->join('category_translates', 'categories.id', 'category_translates.category_id')
            ->join('measurement_products', 'products.id', 'measurement_products.product_id')
            ->where('product_translates.language_code', app()->getLocale())
            ->where('category_translates.language_code', app()->getLocale())
            ->when(!empty($ids), function ($query) use ($ids) {
                $query->whereIn('products.category_id', $ids);
            })
            ->orderBy('products.id')
            ->groupByRaw('products.id')
            ->get();
    }
}

