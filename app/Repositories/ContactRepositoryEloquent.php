<?php

namespace App\Repositories;

use App\Repositories\ContactRepository;
use App\Models\Contact;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class ContactRepositoryEloquent extends BaseRepository implements ContactRepository
{    
    public function model()
    {
        return Contact::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    public function allContact($data = [])
    {
        $message = $data['message'] ?? null;
        $name = $data['name'] ?? null;

        return $this->model->when(!empty($name), function ($q) use ($name) {
                        $q->where('name', 'like', '%' . $name . '%');
                    })
                    ->when(!empty($message), function ($query) use ($message) {
                        $query->where('message', 'like', '%' . $message . '%');
                    })
                    ->paginate(config('constants.paginate'));
    }
}  
