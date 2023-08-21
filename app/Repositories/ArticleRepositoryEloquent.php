<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Article;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    public function model()
    {
        return Article::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
        
    /**
     * getList
     *
     * @param  mixed $data
     * @param  mixed $slug
     * @return void
     */
    public function getList($data, $slug)
    {
        $title = $data['title'] ?? null;

        return $this->model
                ->select([
                    'articles.id',
                    'avatar',
                    'articles.type',
                    'article_translates.title',
                    'category_translates.name_category',
                    'outstanding',
                    'article_translates.description',
                    'article_translates.content',
                    'slug',
                    'articles.created_at'
                ])
                ->when(!empty($title), function ($query) use ($title) {
                    $query->where('title', 'like', '%' . $title . '%');
                })
                ->when(!empty($data['search']), function ($query) use ($data) {
                    $query->where('title', 'like', '%' . $data['search'] . '%');
                })
                ->join('article_translates', 'articles.id', 'article_translates.article_id')
                ->join('categories', 'categories.id', 'articles.category_id')
                ->join('category_translates', 'categories.id', 'category_translates.category_id')
                ->where('articles.type', $slug)
                ->where('category_translates.language_code', app()->getLocale())
                ->where('article_translates.language_code', app()->getLocale())
                ->orderBy('created_at', 'desc')
                ->orderBy('articles.id')
                ->paginate(config('constants.paginate')); 
    }
    
    /**
     * getInfoById
     *
     * @param  mixed $id
     * @param  mixed $slug
     * @return void
     */
    public function getInfoById(int $id, $slug)
    {
        return $this->model
                    ->select([
                        'articles.id',
                        'title',
                        'description',
                        'content',
                        'avatar',
                        'outstanding',
                        'category_id',
                        'status',
                        'language_code'
                    ])
                    ->join('article_translates', 'articles.id', 'article_translates.article_id')
                    ->where('article_translates.article_id', $id) 
                    ->where('articles.type', $slug)
                    ->orderBy('language_code', 'desc')
                    ->get();
    }
    
    /**
     * getInfoBySlug
     *
     * @param  mixed $slug_article
     * @param  mixed $slug
     * @return void
     */
    public function getInfoBySlug($slug_article, $slug)
    {
        return $this->model
                ->select([
                    'articles.id',
                    'avatar',
                    'articles.type',
                    'article_translates.title',
                    'outstanding',
                    'category_translates.name_category',
                    'article_translates.description',
                    'article_translates.content',
                    'slug',
                    'articles.created_at'
                ])
                ->join('article_translates', 'articles.id', 'article_translates.article_id')
                ->join('categories', 'categories.id', 'articles.category_id')
                ->join('category_translates', 'categories.id', 'category_translates.category_id')
                ->where('article_translates.slug', $slug_article) 
                ->where('articles.type', $slug)
                ->get();
    }

    public function getOutstanding($slug)
    {
        return $this->model->select([
                        'articles.id',
                        'avatar',
                        'articles.type',
                        'article_translates.title',
                        'outstanding',
                        'category_translates.name_category',
                        'article_translates.description',
                        'article_translates.content',
                        'slug',
                        'articles.created_at'
                    ])
                    ->join('article_translates', 'articles.id', 'article_translates.article_id')
                    ->join('categories', 'categories.id', 'articles.category_id')
                    ->join('category_translates', 'categories.id', 'category_translates.category_id')
                    ->where('articles.type', $slug)
                    ->where('articles.outstanding', true)
                    ->where('article_translates.language_code', app()->getLocale())
                    ->inRandomOrder()->first(); 
    }
}
