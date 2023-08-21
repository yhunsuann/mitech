<?php

namespace App\Http\Middleware;

use Closure, View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Repositories\ConstantRepository;
use App\Repositories\Interfaces\ConfigContactRepositoryInterface;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('lang_code')) {
            $lang_code = session()->get('lang_code');
            App::setLocale($lang_code);
        } else {
            $lang_code = app()->getLocale();
        }

        $trans = resolve(ConstantRepository::class)->getByLang($lang_code);
        View::share('trans', $trans);

        } 
        
        return $next($request);
    }
}
