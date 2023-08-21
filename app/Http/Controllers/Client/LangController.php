<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class LangController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('client.index');
    }
        
    /**
     * change_language
     *
     * @param  mixed $langcode
     * @return void
     */
    public function change_language($langcode)
    {
        App::setLocale($langcode);
        session()->put('lang_code', $langcode);
        
        return redirect()->back();
    }
}
