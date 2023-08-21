<?php

namespace App\Repositories;

use App\Repositories\DistributorRepository;
use App\Models\Distributor;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class DistributorRepositoryEloquent extends BaseRepository implements DistributorRepository
{    
    public function model()
    {
        return Distributor::class;
    }

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
    public function allDistributors($data = [])
    {
        $status = $data['status'] ?? null;
        $keyword = $data['title'] ?? null;
    
        return $this->model
                ->when(!empty($keyword), function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword . '%');
                })
                ->when(!empty($status), function ($query) use ($status) {
                    $query->where('status', $status);
                })
                ->orderBy('created_at', 'desc')
                ->paginate(config('constants.paginate'));
    }
        
    /**
     * getDistributors
     *
     * @param  mixed $data
     * @return void
     */
    public function getDistributors($data = [])
    {
        return $this->model
            ->select([
                'distributors.latitude',
                'distributors.longitude',
                'distributors.category',
                'distributors.phone_number',
                'distributors.website',
                'distributors.email'
            ])
            ->where('distributors.status', 'active')
            ->get()
            ->toArray();
    }
    
    /**
     * getDataDistributors
     *
     * @return void
     */
    public function getDataDistributors()
    {
        return $this->model
            ->selectRaw('
                id,
                location,
                latitude,
                longitude,
                category,
                phone_number as phone,
                website,
                email,
                name as title,
                city,
                region
            ')
            ->where('distributors.status', 'active')
            ->get()
            ->toArray();
    }
}
