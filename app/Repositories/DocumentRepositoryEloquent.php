<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Document;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{    
    /**
     * model
     *
     * @return void
     */
    public function model()
    {
        return Document::class;
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

        return $this->model
                    ->select([
                        'documents.id',
                        'name',
                        'type',
                        'file',
                        'avatar',
                        'created_at'
                    ])
                    ->when(!empty($keyword), function ($query) use ($keyword) {
                        $query->where('name', 'like', '%' . $keyword . '%');
                    })
                    ->when(!empty($data['search']), function ($query) use ($data) {
                        $query->where('name', 'like', '%' . $data['search'] . '%');
                    })
                    ->when(!empty($type), function ($query) use ($type) {
                        $query->where('type', $type);
                    })
                    ->join('document_translates', 'documents.id', 'document_translates.document_id')
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
                    'documents.id',
                    'name',
                    'status',
                    'type',
                    'avatar',
                    'file',
                    'language_code'
                ])
                ->join('document_translates', 'documents.id', 'document_translates.document_id')
                ->where('document_translates.document_id', $id) 
                ->orderBy('language_code', 'desc')
                ->get();
    }
    
    /**
     * getType
     *
     * @return void
     */
    public function getType()
    {
        return $this->model
                ->select('document_translates.name')
                ->join('document_translates', 'documents.id', 'document_translates.document_id')
                ->where('language_code', app()->getLocale())
                ->groupBy('document_translates.name')
                ->get();
        
    }
}
