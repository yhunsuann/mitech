<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\FormNewRepository;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $articleRepository;
    protected $categoryRepository;
    protected $formNewRepository;

    public function __construct(
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository,
        FormNewRepository $formNewRepository,
    ) {
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->formNewRepository = $formNewRepository;
    }

    public function getIndex() 
    {
        $articles = $this->articleRepository->getList([], 'news');
        $outstanding = $this->articleRepository->getOutstanding('news');
        $category =$this->categoryRepository->allCategories([], 'article');
     
        return view('client.news.index', compact(['articles', 'outstanding', 'category']));
    }

    public function getDetail($request, $slug) 
    {
        $new = $this->articleRepository->getInfoBySlug($slug, 'news')->first();
        if(empty($new)){
            abort(404);
        }

        $articles = $this->articleRepository->getList([], 'news');

        return view('client.news.detail', compact(['new', 'articles']));
    }

    public function submitNew(Request $request) 
    {
        $this->formNewRepository->create($request->only(['subscribtionEmail']));

        return response()->json(['status' => true, 'message' => __('message.contact_success')]);
    }
}
