<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ReplacementRepository;
use App\Models\FormReplacement;
use App\Validators\ReplacementValidator;

/**
 * Class ReplacementRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormReplacementRepositoryEloquent extends BaseRepository implements FormReplacementRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FormReplacement::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getAllFormReplacement($data = [])
    {
        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;
        return  $this->model
                            ->when(!empty($name), function ($query) use ($name) {
                                $query->where(function ($query) use ($name){
                                    $query->where('first_name', 'like', '%' . $name . '%')
                                        ->orWhere('last_name', 'like', '%' . $name . '%');
                                });
                            })
                            ->when(!empty($email), function ($query) use ($email) {
                                $query->where('email_address', 'like', '%' . $email . '%');
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate'));
    }
}
