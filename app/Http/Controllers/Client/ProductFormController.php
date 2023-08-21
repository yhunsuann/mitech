<?php

namespace App\Http\Controllers\Client;

use App\Repositories\FormProductRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormProduct;

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
    
    /**
     * submitProduct
     *
     * @param  mixed $request
     * @return void
     */
    public function submitProduct(Request $request)
    {
        $request->merge(['language_code' => app()->getLocale()]);
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'language_code' => app()->getLocale(),
            'email' => $request->email,
            'message' => $request->message
        ];
        $this->registerProductsRepository->create($data);

        return response()->json(['status' => true, 'message' => __('message.contact_success')]);
    }    
}
