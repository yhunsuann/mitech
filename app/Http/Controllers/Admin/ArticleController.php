<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LanguageRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\ArticleTranslateRepository;
use App\Http\Requests\ArticleRequest;
use App\Models\IntroductionTranslate;
use App\Repositories\CategoryRepository;
use App\Repositories\IntroductionRepository;
use Cocur\Slugify\Slugify;
use App\Services\FileUploader;

class ArticleController extends Controller
{    
    /**
     * languageRepository
     *
     * @var mixed
     */
    protected $languageRepository;
        
    /**
     * fileUploader
     *
     * @var mixed
     */
    protected $fileUploader;
        
    /**
     * categoryRepository
     *
     * @var mixed
     */
    protected $categoryRepository;
        
    /**
     * articleRepository
     *
     * @var mixed
     */
    protected $articleRepository;
    
    /**
     * introductionRepository
     *
     * @var mixed
     */
    protected $introductionRepository;
        
    /**
     * articleTranslateRepository
     *
     * @var mixed
     */
    protected $articleTranslateRepository;

    public function __construct(
        LanguageRepository $languageRepository,
        CategoryRepository $categoryRepository, 
        ArticleRepository $articleRepository,
        ArticleTranslateRepository $articleTranslateRepository,
        IntroductionRepository $introductionRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
        $this->fileUploader = new FileUploader;
        $this->articleRepository = $articleRepository;
        $this->articleTranslateRepository = $articleTranslateRepository;
        $this->introductionRepository = $introductionRepository;
    }
    
    /**
     * index
     *
     * @param  mixed $request
     * @param  mixed $segment
     * @return void
     */
    public function index(Request $request, $segment)
    {
        $articles = $this->articleRepository->getList($request->all(), $segment);
   
        return view('admin.article.index', compact('segment', 'articles'));
    }
    
    /**
     * create
     *
     * @param  mixed $segment
     * @return void
     */
    public function create($segment)
    {
        $result = $this->languageRepository->listLanguage();
        $category =$this->categoryRepository->allCategories([], 'article');

        return view('admin.article.create', compact(['segment', 'result', 'category']));
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $segment
     * @return void
     */
    public function store(ArticleRequest $request, $segment)
    {
        $request->merge(['type' => $segment]);
        if ($request->has('outstanding')){
            $outstandingData = true;
            $request->merge(['outstanding' => $outstandingData]);  
        }

        $artile = $this->articleRepository->create(
            $request->only([
                        'status',
                        'outstanding',
                        'category_id',
                        'type'
                    ])
        );

        $languageData = [];
        $slugify = new Slugify();

        foreach ($request['language_code'] as $key => $language) {
            $title = $request['title'][$key];
            $slug = $slugify->slugify($title, '-');

            $data = [
                'article_id' => $artile->id,
                'title' => $request['title'][$key],
                'language_code' => $request['language_code'][$key],
                'description' => $request['description'][$key],
                'content' => $request['content'][$key],
                'slug' => $slug
            ];

            if ($request->has('upload_avatar') && isset($request['upload_avatar'][$language])) {
                $file_mame = null;
                $file_name = $this->fileUploader->uploadAvartarArticle($request['upload_avatar'][$language], $segment);
                $data['avatar'] = $file_name;
            }

            $languageData[$language] = $data;
            $this->articleTranslateRepository->create($data);
        }

        return redirect()->route('admin.article.index', ['segment' => $segment])->with('success', 'Thêm bài viết thành công');
    }
    
    /**
     * edit
     *
     * @param  mixed $segment
     * @param  mixed $id
     * @return void
     */
    public function edit($segment, $id)
    {
        $result = $this->languageRepository->listLanguage();
        $article = $this->articleRepository->getInfoById($id, $segment);
        $category =$this->categoryRepository->allCategories([], 'article');

        return view('admin.article.edit', compact(['segment', 'result', 'article', 'category']));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $segment
     * @param  mixed $id
     * @return void
     */
    public function update(ArticleRequest $request, $segment, $id)
    {
        if ($request->has('outstanding')){
            $outstandingData = true;
            $request->merge(['outstanding' => $outstandingData]);  
        } else {
            $request->merge(['outstanding' => null]);  
        }

        $this->articleRepository->where('id', $id)->update(
            $request->only([
                'status',
                'outstanding',
                'category_id'
            ])
        );

        $slugify = new Slugify();
    
        foreach ($request['language_code'] as $key => $language) {
            $title = $request['title'][$key];
            $slug = $slugify->slugify($title, '-');

            $data = [
                'title' => $request['title'][$key],
                'description' => $request['description'][$key],
                'content' => $request['content'][$key],
                'slug' => $slug
            ];

            if ($request->has('upload_avatar') && isset($request['upload_avatar'][$language])) {
                $file_name = null;
                $file_name = $this->fileUploader->uploadAvartarArticle($request['upload_avatar'][$language], $segment);
                $data['avatar'] = $file_name;
            }  else if($request->has('old_avatar') && !empty($request['old_avatar'][$key])) {
                $data['avatar'] = null;
            }

            $languageData[$language] = $data;
            $this->articleTranslateRepository->where('article_id', $id)
                                            ->where('language_code', $request['language_code'][$key])
                                            ->update($data);
        }

        return redirect()->route('admin.article.index', ['segment' => $segment])->with('success', 'Chỉnh sửa bài viết thành công');
    }
    
    /**
     * delete
     *
     * @param  mixed $segment
     * @param  mixed $id
     * @return void
     */
    public function delete($segment, $id)
    {
        $this->articleRepository->find($id)->delete();

        return redirect()->route('admin.article.index', ['segment' => $segment])->with('success', 'Xóa bài viết thành công.');
    }
    
    /**
     * aboutUs
     *
     * @return void
     */
    public function aboutUs()
    {
        $result = $this->languageRepository->listLanguage();
        $about = $this->introductionRepository->getItem();

        return view('admin.article.about-us', compact(['result', 'about']));
    }

    /**
     * aboutUs
     *
     * @return void
     */
    public function aboutUsProcess(Request $request)
    {
        for ($i = 0; $i < count($request['language_code']); $i++) { 
            $trans = IntroductionTranslate::where('language_code', $request['language_code'][$i])->first();

            $trans->update([
                'language_code' => $request['language_code'][$i],
                'mitect_title' => $request['mitect_title'][$i],
                'mitect_content' => $request['mitect_content'][$i],
                'vgsi_title' => $request['vgsi_title'][$i],
                'content_about_1' => $request['content_about_1'][$i],
                'content_about_2' => $request['content_about_2'][$i],
                'content_about_3' => $request['content_about_3'][$i],
                'vision_title' => $request['vision_title'][$i],
                'vision_content' => $request['vision_content'][$i],
                'mission_title' => $request['mission_title'][$i],
                'mission_content' => $request['mission_content'][$i]
            ]);

            $files = [
                'mitect_file',
                'vgsi_file',
                'about_file',
                'vision_file',
                'mission_file'
            ];

            foreach ($files as $key => $file) {
                if (!empty($trans) && !empty($request[$file . '_' . $i])) {
                    $trans->$file = $this->fileUploader->uploadSlider($request[$file . '_' . $i], 'about');
                    $trans->save();
                }
            }
        }

        return redirect()->route('admin.article.about-us.form')->with('success', 'Chỉnh sửa thông tin thành công');
    }
}
