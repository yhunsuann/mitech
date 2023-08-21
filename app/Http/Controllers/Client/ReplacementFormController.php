<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Repositories\FormReplacementRepository;
use App\Http\Controllers\Controller;

class ReplacementFormController extends Controller
{    
    /**
     * replacementRepository
     *
     * @var mixed
     */
    protected $replacementRepository;
    
    /**
     * __construct
     *
     * @param  mixed $replacementRepository
     * @return void
     */
    public function __construct(FormReplacementRepository $replacementRepository)
    {
        $this->replacementRepository = $replacementRepository;
    }
    
    /**
     * submitWarranty
     *
     * @param  mixed $request
     * @return void
     */
    public function submitWarranty(Request $request)
    {
        $data = $request->only(['first_name', 'last_name', 'email_address', 'phone_number', 'time', 'address']);
        $this->replacementRepository->create($data);

        return response()->json(['status' => true, 'message' => __('message.contact_success')]);
    }
}
