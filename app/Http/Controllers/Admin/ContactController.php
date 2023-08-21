<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use App\Repositories\ConstantRepository;
use App\Repositories\LanguageRepository;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{    
    /**
     * contactRepository
     *
     * @var mixed
     */
    protected $contactRepository;
        
    /**
     * constantRepository
     *
     * @var mixed
     */
    protected $constantRepository;

    /**
     * languageRepository
     *
     * @var mixed
     */
    protected $languageRepository;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        ContactRepository $contactRepository,
        ConstantRepository $constantRepository,
        LanguageRepository $languageRepository
    ) {
        $this->contactRepository = $contactRepository;
        $this->constantRepository = $constantRepository;
        $this->languageRepository = $languageRepository;
    }
    
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        $value = $this->contactRepository->allContact($request->all());
        
        return view('admin.contact.home',['result' => $value]);
    }
    
    /**
     * configContact
     *
     * @return void
     */
    public function config(){
        $result = $this->constantRepository->getAllConstant();
        $languages = $this->languageRepository->listLanguage();
    
        return view('admin.contact.constant', compact('result', 'languages'));
    }    
    
    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function configProcess(Request $request)
    {   
        $params = $request->except('_token');
        foreach ($params as $key => $value) {

            $this->constantRepository->save($key, $value);
        }

        return redirect()->route('admin.config.index')->with('success', 'Successfully');
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $this->contactRepository->find($id)->delete();

        return back()->withSuccess('Xóa liên hệ thành công.'); 
    }
}
