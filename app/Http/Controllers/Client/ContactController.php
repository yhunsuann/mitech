<?php

namespace App\Http\Controllers\Client;

use App\Repositories\ConstantRepository;
use App\Repositories\ContactRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Client\ContactRequest;

class ContactController extends Controller
{  
    /**
     * configContactRepository
     *
     * @var mixed
     */
    protected $constantRepository;
        
    /**
     * contactRepository
     *
     * @var mixed
     */
    protected $contactRepository;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        ConstantRepository $constantRepository, 
        ContactRepository $contactRepository
    ) {
        $this->constantRepository = $constantRepository;
        $this->contactRepository = $contactRepository;
    }
  
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $value = $this->constantRepository->getAllConstant();

        return view('client.contact.index',['result' => $value]);
    }
        
    /**
     * submitContact
     *
     * @param  mixed $request
     * @return void
     */
    public function submitContact(ContactRequest $request)
    {
        $request->merge(['language_code' => app()->getLocale()]);
        $data = $request->only(['name', 'email', 'address', 'phone_number', 'message', 'language_code']);
        $this->contactRepository->create($data);

        return response()->json(['status' => true, 'message' => __('message.contact_success')]);
    }
    
    /**
     * getIndex
     *
     * @return void
     */
    public function getIndex() 
    {
        return view('client.contact-us.index');
    }
}
