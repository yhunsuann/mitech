<?php

namespace App\Repositories;

use App\Models\FormDistributor;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class RegisterPartnersRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormDistributorRepositoryEloquent extends BaseRepository implements FormDistributorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return FormDistributor::class;
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
    public function formDistributors($data = [])
    {
        $email = $data['email'] ?? null;
        $name = $data['name'] ?? null;
        $phone_number = $data['phone_number'] ?? null;
        $request_type = $data['request_type'] ?? null;
    
        return $this->model
                ->when(!empty($name), function ($query) use ($name) {
                    $query->where('full_name', 'like', '%' . $name . '%');
                })
                ->when(!empty($email), function ($query) use ($email) {
                    $query->where('email_address', 'like', '%' . $email . '%');
                })
                ->when(!empty($phone_number), function ($query) use ($phone_number) {
                    $query->where('distributor_phone', 'like', '%' . $phone_number . '%');
                })
                ->when(!empty($request_type), function ($query) use ($request_type) {
                    $query->where('form_type', 'like', '%' . $request_type . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(config('constants.paginate'));
    }
    
}
