<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Menu;
use App\Models\ProductTranslate;
use App\Models\ArticleTranslate;
use App\Models\LibraryTranslate;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MenuRepositoryEloquent extends BaseRepository implements MenuRepository
{
    public function model()
    {
        return Menu::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getList($locale)
    {
        return $this->model->select([
                    'menus.id',
                    'menu_translates.menu_name',
                    'menu_translates.slug',
                    'sort',
                    'menu_translates.description',
                    'is_footer'
                ])
                ->with('children.menuTransateDefault')
                ->join('menu_translates', 'menus.id', 'menu_translates.menu_id')
                ->where('language_code', $locale)
                ->where('id_parent', 0)
                ->orderBy('sort')
                ->get();
    }
    
    /**
     * getAllSlugs
     *
     * @return void
     */
    public function getAllSlugs($locale)
    {
        return $this->model->select([
                'menus.id',
                'menu_translates.slug',
            ])
            ->join('menu_translates', 'menus.id', 'menu_translates.menu_id')
            ->where('language_code', $locale)
            ->orderBy('sort')
            ->pluck('slug', 'id')
            ->toArray();
    }

    public function getSlug($slug)
    {
        $article_id = ArticleTranslate::select('article_id')->where('slug', $slug)->first();
        $product_id = ProductTranslate::select('product_id')->where('slug', $slug)->first();
        $library_id = LibraryTranslate::select('library_id')->where('slug', $slug)->first();
    
        if (!empty($article_id)) {
            $slugArticle = ArticleTranslate::select('slug')
                ->where('article_id', $article_id->article_id)
                ->where('language_code', '!=', app()->getLocale())
                ->first();
            return $slugArticle;
        }
    
        if (!empty($product_id)) {
            $slugProduct = ProductTranslate::select('slug')
                ->where('product_id', $product_id->product_id)
                ->where('language_code', '!=', app()->getLocale())
                ->first();
            return $slugProduct;
        }
    
        if (!empty($library_id)) {
            $slugLybrary = LibraryTranslate::select('slug')
                ->where('library_id', $library_id->library_id)
                ->where('language_code', '!=', app()->getLocale())
                ->first();
            return $slugLybrary;
        }
    }
}
