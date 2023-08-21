<?php

namespace App\Http\Controllers\Client;

use App\Repositories\FormDistributorRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormDistributor;

class DistributorFormController extends Controller
{   
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
   * submitContact
   *
   * @param  mixed $request
   * @return void
   */
  public function submitDistributor(Request $request)
  {
      $request->merge(['language_code' => app()->getLocale()]);
      $data = [
        'full_name' => $request->full_name,
        'distributor_phone' => $request->distributor_phone,
        'language_code' => app()->getLocale(),
        'form_type' => $request->form_type,
        'city' => $request->city,
        'district' => $request->district,
        'email_address' => $request->email_address,
        'address_1' => $request->address_1,
        'address_2' => $request->address_2,
        'position' => $request->position
      ];
      $this->registerPartnersRepository->create($data);

      return response()->json(['status' => true, 'message' => __('message.contact_success')]);
  }
  /**
   * getIndexs
   *
   * @return void
   */
  public function getIndex() 
  {
    return view('client.distributor.index');
  }   
}
