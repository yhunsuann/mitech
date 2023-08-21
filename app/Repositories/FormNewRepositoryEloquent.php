<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FormNewRepository;
use App\Models\FormNew;

/**
 * Class FormNewRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormNewRepositoryEloquent extends BaseRepository implements FormNewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FormNew::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllFormNew($data = [])
    {
        $email = $data['email'] ?? null;
        return  $this->model
                            ->when(!empty($email), function ($query) use ($email) {
                                $query->where('subscribtionEmail', 'like', '%' . $email . '%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate'));
    }
}
