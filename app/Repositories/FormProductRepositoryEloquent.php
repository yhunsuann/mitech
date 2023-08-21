<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\FormProduct;

/**
 * Class RegisterProductsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormProductRepositoryEloquent extends BaseRepository implements FormProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FormProduct::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    /**
     * allDistributors
     *
     * @param  mixed $data
     * @return void
     */
    public function formProducts($data = [])
    {
        $email = $data['email'] ?? null;
        $keyword = $data['name'] ?? null;
    
        return $this->model
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                ->when(!empty($email), function ($query) use ($email) {
                    $query->where('email', 'like', '%' . $email . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(config('constants.paginate'));
    }
    
}
