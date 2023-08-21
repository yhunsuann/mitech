<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\ProductTranslateRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\MeasurementProductRepository;
use App\Services\FileUploader;
use App\Http\Controllers\Controller;
use Cocur\Slugify\Slugify;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{    
    /**
     * productRepository
     *
     * @var mixed
     */
    protected $productRepository;

       /**
     * productRepository
     *
     * @var mixed
     */
    protected $productTranslateRepository;
          
    /**
     * languageRepository
     *
     * @var mixed
     */
    protected $categoryRepository;

         /**
     * productRepository
     *
     * @var mixed
     */
    protected $measurementProductRepository;
        
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
        ProductRepository $productRepository, 
        ProductTranslateRepository $productTranslateRepository, 
        LanguageRepository $languageRepository,
        MeasurementProductRepository $measurementProductRepository,
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->productTranslateRepository = $productTranslateRepository;
        $this->measurementProductRepository = $measurementProductRepository;
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
        $products = $this->productRepository->getList($request->all());
        $category = $this->categoryRepository->allCategories([], 'product');

        return view('admin.product.index', compact('products', 'category'));    
    }
    
    /**
     * Create products page
     *
     * @return void
     */
    public function create()
    {
        $result = $this->languageRepository->listLanguage();
        $category =$this->categoryRepository->allCategories([], 'product');

        return view('admin.product.create', compact('category', 'result'));
    }
     
    /**
     * Add products
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->has('upload_avatar')) {
            $file_name = $this->fileUploader->uploadFile($request , 'product');
            if ($file_name !== null) {
                $request->merge(['avatar' => $file_name]);
            }
        }

        if ($request->has('upload_images')) {
            $file_name = $this->fileUploader->uploadMutilFile($request, 'product');
            if ($file_name !== null) {
                $request->merge(['image' => $file_name]);
            }
        }

        $product = $this->productRepository->create(
            $request->only([
                        'avatar',
                        'image',
                        'status',
                        'category_id'
                    ])
        );
        $slugify = new Slugify();
        foreach ($request['language_code'] as $key => $language) {
            $name = $request['name'][$key];
            $slug = $slugify->slugify($name, '-');
            $data = [
                'product_id' => $product->id,
                'language_code'=> $language,
                'name' => $request['name'][$key],
                'description' => $request['description'][$key],
                'content' => $request['content'][$key],
                'slug' => $slug
            ];
            $this->productTranslateRepository->create($data);
        }

        foreach ($request['price'] as $key => $price) {
            if($request['category_id'] != 13){
                $data = [
                    'product_id' => $product->id,
                    'price' => $price,
                    'thickness'=>  $request['thickness'][$key],
                    'width'=>  $request['width'][$key],
                    'height'=>  $request['height'][$key],
                    'thickness_unit'=>  $request['thickness_unit'][$key]      
                ];
            } else {
                $data = [
                    'product_id' => $product->id,
                    'price' => $price,
                    'thickness'=>  $request['thickness'][$key],
                    'width'=> null,
                    'height'=> null,
                    'thickness_unit'=>  $request['thickness_unit'][$key]      
                ];
            }
            $this->measurementProductRepository->create($data);
        }

        return redirect()->route('admin.product.index')->withSuccess('Thêm mới sản phẩm thành công.');
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->productRepository->find($id)->delete();

        return back()->withSuccess('Xóa sản phẩm thành công.'); 
    }
    
    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $result = $this->languageRepository->listLanguage();
        $product = $this->productRepository->getInfoById($id);
        $category = $this->categoryRepository->allCategories([], 'product');
        $measurement = $this->measurementProductRepository->where('product_id', $id)->get();

        return view('admin.product.edit', compact(['result', 'product', 'category', 'measurement']));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data_product = [
            'status' => $request['status'],
            'category_id' => $request['category_id'],
        ];

        if ($request->has('upload_avatar')) {
            $file_name = $this->fileUploader->uploadFile($request , 'product');
            if ($file_name !== null) {
                $data_product['avatar'] = $file_name;
            }
        } else if($request->has('old_avatar')){
            $data_product['avatar'] = null;
        }

        if ($request->has('upload_images')) { 
            if (empty($request->old_image)) {
                $array1 = [];
            } else {
                $str1 = str_replace(['[', ']', '"'], '', $request->old_image);
                $array1 = explode(',', $str1);
            }

            $file_name = $this->fileUploader->uploadMutilFile($request, 'product');
            $str2 = str_replace(['[', ']', '"'], '', $file_name);
            $array2 = explode(',', $str2);
            $result = array_merge($array1, $array2);
            $image = json_encode($result);
            if ($image !== null) {
                $data_product['image'] = $image;
            }
        } else { 
            $str1 = str_replace(['[', ']', '"'], '', $request->old_image);
            $array1 = explode(',', $str1);
            $image = json_encode($array1);

            if($image != '[""]'){
                $data_product['image'] = $image;
            } else {
                $data_product['image'] = null;
            }
        }

        $this->productRepository->where('id', $id)->update($data_product);
        $slugify = new Slugify();
        foreach ($request['language_code'] as $key => $language) {
            $name = $request['name'][$key];
            $slug = $slugify->slugify($name, '-');
            
            $data = [
                'name' => $request['name'][$key],
                'description' => $request['description'][$key],
                'content' => $request['content'][$key],
                'slug' => $slug
            ];
            $this->productTranslateRepository->where('product_id', $id)->where('language_code', $language)->update($data);
        }
   
        $productOld = $this->measurementProductRepository->where('product_id', $id)->pluck('id')->toArray();
        $productNew = array_keys($request['price']);
      
        $permissionOld = $productOld ?: [];
        $PermissionsNew = $productNew ?: [];

        $productToDelete = array_diff($permissionOld, $PermissionsNew);

        foreach ($productToDelete as $id) {
            $this->measurementProductRepository->find($id)->delete();
        }

        foreach ($request['price'] as $key => $price) {
            if($request['category_id'] != 13){
                $data = [
                    'price' => $price,
                    'thickness'=>  $request['thickness'][$key],
                    'width'=>  $request['width'][$key],
                    'height'=>  $request['height'][$key],
                    'thickness_unit'=>  $request['thickness_unit'][$key],   
                ];
            } else {
                $data = [
                    'price' => $price,
                    'thickness'=>  $request['thickness'][$key],
                    'width'=> null,
                    'height'=> null,
                    'thickness_unit'=>  $request['thickness_unit'][$key],   
                ];
            }
            $this->measurementProductRepository->where('id',$key)->update($data);   
        }

        if (isset($request['new_price'])) {
            foreach ($request['new_price'] as $key => $price) {
                if($request['category_id'] != 13){
                    $data = [
                        'product_id' => $id,
                        'price' => $price,
                        'thickness'=>  $request['new_thickness'][$key],
                        'width'=>  $request['new_width'][$key],
                        'height'=>  $request['new_height'][$key],
                        'thickness_unit'=>  $request['new_thickness_unit'][$key]      
                    ];
                } else {
                    $data = [
                        'product_id' => $id,
                        'price' => $price,
                        'thickness'=>  $request['new_thickness'][$key],
                        'width'=> null,
                        'height'=> null,
                        'thickness_unit'=>  $request['new_thickness_unit'][$key]      
                    ];
                }
            $this->measurementProductRepository->create($data);
            }
        }
 
        return redirect()->route('admin.product.index')->withSuccess('Cập nhật sản phẩm thành công.');
    }
}
