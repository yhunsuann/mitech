<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\FAQ;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FAQRepositoryEloquent extends BaseRepository implements FAQRepository
{
    public function model()
    {
        return FAQ::class;
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
                                'status',
                                'language_code'
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
                            ->orderBy('language_code', 'desc')
                            ->where('faq_translates.faq_id', $id) 
                            ->get();
    }

    public function getListClient($data = [])
    {
        $keyword = $data['keyword'] ?? null;
        $topic = $data['topic'] ?? null;

        $query = $this->model->select([
            'faqs.id',
            'question',
            'answer',
            'topic',
            'status',
            'language_code'
        ])
        ->when(!empty($keyword), function ($query) use ($keyword) {
            $query->where(function ($query) use ($keyword){
                $query->where('question', 'like', '%' . $keyword . '%')
                    ->orWhere('answer', 'like', '%' . $keyword . '%');
            });
        })
        ->when(!empty($data['search']), function ($query) use ($data) {
            $query->where(function ($query) use ($data){
                $query->where('question', 'like', '%' . $data['search'] . '%')
                    ->orWhere('answer', 'like', '%' . $data['search'] . '%');
            });
        })
        ->when(!empty($topic), function ($query) use ($topic) {
            $query->where('topic', $topic);
        })
        ->join('faq_translates', 'faqs.id', 'faq_translates.faq_id')
        ->where('language_code', app()->getLocale());

        return $query->get()->groupBy('topic');
    }
}
