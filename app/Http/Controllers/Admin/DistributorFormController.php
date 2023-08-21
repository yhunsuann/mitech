<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\FormDistributorRepository;
use App\Http\Controllers\Controller;

class DistributorFormController extends Controller
{       
    protected $registerProductsRepository;
    /**
     * registerPartnersRepository
     *
     * @var mixed
     */
    protected $registerPartnersRepository;
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(FormDistributorRepository $registerPartnersRepository) 
    {
        $this->registerPartnersRepository = $registerPartnersRepository;
    }   
    /**
     * formDistributor
     *
     * @return void
     */
    public function formDistributor(Request $request)
    { 
        $result = $this->registerPartnersRepository->formDistributors($request->all());
       
        return view('admin.distributor.form_distributor', compact('result'));    
    }

    public function deleteDistributor($id)
    {
        $this->registerPartnersRepository->find($id)->delete();

        return back()->withSuccess('Xóa liên hệ nhà phân phối thành công.'); 
    }
}
