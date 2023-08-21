<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\FormProductRepository;
use App\Repositories\MeasurementProductRepository;
use App\Models\Menu;
use Illuminate\Http\Request;

class ProductController extends Controller
{    
    /**
     * productRepository
     *
     * @var mixed
     */
    protected $productRepository;
        
    /**
     * registerProductsRepository
     *
     * @var mixed
     */
    protected $registerProductsRepository;
        
    /**
     * measurementProductRepository
     *
     * @var mixed
     */
    protected $measurementProductRepository;
    
    /**
     * categoryRepository
     *
     * @var mixed
     */
    protected $categoryRepository;
        
    /**
     * __construct
     *
     * @param  mixed $productRepository
     * @return void
     */
    public function __construct(
        FormProductRepository $registerProductsRepository,
        MeasurementProductRepository $measurementProductRepository,
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->registerProductsRepository = $registerProductsRepository;
        $this->measurementProductRepository = $measurementProductRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
    
    /**
     * index
     *
     * @return void
     */
    public function index()
    { 
        $products = $this->productRepository->getProducts();
      
        return view('client.products-solutions.index', compact('products'));    
    }
       
    /**
     * detail
     *
     * @param  mixed $id
     * @return void
     */
    public function detail($id)
    {
        $result = $this->productRepository->getInfoById((int)$id);
        $products = $this->productRepository->getProducts();
            
        return view('client.products-solutions.products.detail', compact('products', 'result'));
    }
    
    /**
     * getIndex
     *
     * @return void
     */
    public function getIndex() 
    {
        $products = $this->productRepository->getList();
        
        return view('client.products-solutions.index', compact('products'));
    }
        
    /**
     * getProducts
     *
     * @return void
     */
    public function getProducts($request) 
    {
        $products = $this->productRepository->getList();
        $categories = $this->categoryRepository->getList(['type' => 'product']);

        if ($request->all()) {
            return view('client.products-solutions.products.list_view', compact('products', 'categories'));
        } else {
            return view('client.products-solutions.products.index', compact('products', 'categories'));
        }
    }
    
    /**
     * getDetail
     *
     * @param  mixed $request
     * @param  mixed $detail
     * @return void
     */
    public function getDetail($request, $detail)
    {
        $products = $this->productRepository->getList();
        $product = $this->productRepository->getInfoBySlug($detail);

   
        if (!$product->isNotEmpty()) {
            abort(404);
        } else {
            $measurements = $this->measurementProductRepository->where('product_id', $product->first()->id)->get();
        }

        $products = $this->productRepository->getList();
        
        return view('client.products-solutions.products.detail', compact(['product', 'measurements', 'products']));
    }
    
    /**
     * getListProducts
     *
     * @return void
     */
    public function getListProducts(Request $request)
    {
        if ($request->ajax()) {
            $products = $this->productRepository->getListByMutipleIds($request->product_type);
    
            return view('client.product.jax-list', compact('products', 'request'));
        }abort(404);
    }
}
