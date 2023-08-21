<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryTranslateRepository;
use App\Repositories\LanguageRepository;
use App\Services\FileUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{    
    /**
     * categoryRepository
     *
     * @var mixed
     */
    protected $categoryRepository;

     /**
     * categoryTranslateRepository
     *
     * @var mixed
     */
    protected $categoryTranslateRepository;
        
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
     * __construct
     *
     * @return void
     */
    public function __construct(
        CategoryRepository $categoryRepository, 
        LanguageRepository $languageRepository,
        CategoryTranslateRepository $categoryTranslateRepository
    ) {
        $this->categoryTranslateRepository = $categoryTranslateRepository;
        $this->categoryRepository = $categoryRepository;
        $this->languageRepository = $languageRepository;
        $this->fileUploader = new FileUploader;
    }
    
    /**
     * get index page
     *
     * @return void
     */
    public function index(Request $request)
    { 
        $category = $this->categoryRepository->allCategories($request->all());

        return view('admin.category.index', compact('category'));    
    }
    
    /**
     * Create category page
     *
     * @return void
     */
    public function create()
    {
        $data = $this->languageRepository->listLanguage();
        
        return view('admin.category.create')->with('result',$data);
    }
    
    /**
     * Add category
     *
     * @param  mixed $request
     * @return void
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryRepository->create([
            'status' => $request->status,
            'type' => $request['type'] ?? 'product'
        ]);

        foreach ($request['language_code'] as $key => $language) {
            $data = [
                'language_code' => $request['language_code'][$key],
                'category_id' => $category->id,
                'name_category' => $request['name_category'][$key],
                'description' => $request['description'][$key]
            ];

            $this->categoryTranslateRepository->create($data);
        }

        return redirect()->route('admin.category.index')->withSuccess('Create Category Successfully');
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->categoryRepository->find($id)->delete();

        return back()->withSuccess('Delete Category Successfully'); 
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $categorys = $this->categoryRepository->getInfoByIdCategory($id);
        $result = $this->languageRepository->listLanguage();

        return view('admin.category.edit', compact(['categorys', 'result']));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(CategoryRequest $request, $id)
    {   
        $this->categoryRepository->where('id', $id)->update(
            $request->only([
                'status',
                'type'
            ])
        );
        
        foreach ($request['language_code'] as $key => $language) {
            $data = [
                'name_category' => $request['name_category'][$key],
                'description' => $request['description'][$key]
            ]; 

            $this->categoryTranslateRepository->where('category_id', $id)
                                              ->where('language_code', $language)
                                              ->update($data);
        }
        return redirect()->route('admin.category.index')->withSuccess('Edit Category Successfully');
    }
}
