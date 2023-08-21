<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FormNewRepository;

class FormNewController extends Controller
{
    protected $formNewRepository;

    public function __construct(FormNewRepository $formNewRepository)
    {
        $this->formNewRepository = $formNewRepository;
    }

    
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request) 
    {
        $result = $this->formNewRepository->getAllFormNew($request->all());

        return view('admin.form-new.index', compact('result'));
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->formNewRepository->find($id)->delete();

        return back()->withSuccess('Xóa người đăng ký nhận tin mới thành công'); 
    }
}
