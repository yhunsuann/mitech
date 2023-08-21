<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\ArticleTranslate;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ArticleTranslateRepositoryEloquent extends BaseRepository implements ArticleTranslateRepository
{
    public function model()
    {
        return ArticleTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getList($data)
    {
        $keyword = $data['keyword'] ?? null;
        $type = $data['type'] ?? null;

        return $this->model->select([
                                'documents.id',
                                'name',
                                'type',
                                'file',
                                'created_at'
                            ])
                            ->when(!empty($keyword), function ($query) use ($keyword) {
                                $query->where('name', 'like', '%' . $keyword . '%');
                            })
                            ->when(!empty($type), function ($query) use ($type) {
                                $query->where('type', $type);
                            })
                            ->join('document_translates', 'documents.id', 'document_translates.document_id')
                            ->where('language_code', app()->getLocale())
                            ->paginate(config('constants.paginate')); 
    }

    public function getInfoById(int $id)
    {
        return $this->model->select([
                                'documents.id',
                                'name',
                                'status',
                                'type',
                                'file',
                                'language_code'
                            ])
                            ->join('document_translates', 'documents.id', 'document_translates.document_id')
                            ->where('document_translates.document_id', $id) 
                            ->get();
    }
}
