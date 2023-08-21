<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\IntroductionRepository;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{    
    /**
     * getIndex
     *
     * @return void
     */
    public function getIndex() 
    {
      $aboutUs = resolve(IntroductionRepository::class)->getInfo();

      return view('client.about-us.index', compact(['aboutUs']));
    }
    
    /**
     * getDetail
     *
     * @return void
     */
    public function getDetail() 
    {
      return view('client.about-us.about-us-2.index');
    }
}
