<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\DocumentTranslate;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DocumentTranslatesRepositoryEloquent extends BaseRepository implements DocumentTranslatesRepository
{
    public function model()
    {
        return DocumentTranslate::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getList($data)
    {
        $keyword = $data['keyword'] ?? null;
        $topic = $data['topic'] ?? null;

        return $this->model->select([
                                'faqs.id',
                                'question',
                                'answer',
                                'topic',
                                'status'
                            ])
                            ->when(!empty($keyword), function ($query) use ($keyword) {
                                $query->where(function ($query) use ($keyword){
                                    $query->where('question', 'like', '%' . $keyword . '%')
                                        ->orWhere('answer', 'like', '%' . $keyword . '%');
                                });
                            })
                            ->when(!empty($topic), function ($query) use ($topic) {
                                $query->where('topic', $topic);
                            })
                            ->join('faq_translates', 'faqs.id', 'faq_translates.faq_id')
                            ->where('language_code', app()->getLocale())
                            ->orderBy('created_at', 'desc')
                            ->paginate(config('constants.paginate')); 
    }

    public function getInfoById(int $id)
    {
        return $this->model->select([
                                'faqs.id',
                                'question',
                                'answer',
                                'topic',
                                'status',
                                'language_code'
                            ])
                            ->join('faq_translates', 'faqs.id', 'faq_translates.faq_id')
                            ->where('faq_translates.faq_id', $id) 
                            ->get();
    }
}
