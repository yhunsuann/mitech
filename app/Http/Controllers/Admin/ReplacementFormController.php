<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FormReplacementRepository;

class ReplacementFormController extends Controller
{    
    /**
     * replacementRepository
     *
     * @var mixed
     */
    protected $replacementFormRepository;
    
    /**
     * __construct
     *
     * @param  mixed $replacementRepository
     * @return void
     */
    public function __construct(FormReplacementRepository $replacementFormRepository)
    {
        $this->replacementFormRepository = $replacementFormRepository;
    }
        
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        $replacements = $this->replacementFormRepository->getAllFormReplacement($request->all());
        
        return view('admin.warranty.index', compact('replacements'));
    }
    
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->replacementFormRepository->find($id)->delete();

        return back()->withSuccess('Xóa người liên hệ bảo hành thành công.'); 
    }
}
