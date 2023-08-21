<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\FormProductRepository;
use App\Http\Controllers\Controller;

class ProductFormController extends Controller
{       
     /**
     * registerProductsRepository
     *
     * @var mixed
     */
    protected $registerProductsRepository;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(FormProductRepository $registerProductsRepository) 
    {
        $this->registerProductsRepository = $registerProductsRepository;
    }

    public function formProduct(Request $request)
    { 
        $result = $this->registerProductsRepository->formProducts($request->all());
       
        return view('admin.product.form_product', compact('result'));    
    }

    public function deleteProduct($id)
    {
        $this->registerProductsRepository->find($id)->delete();

        return back()->withSuccess('Xóa nhà phân phối thành công'); 
    }
}
