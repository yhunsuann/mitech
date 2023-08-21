<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $locales = ['vi', 'en'];
        $locale = $request->segment(1);

        if (in_array($locale, $locales)) {
            app()->setLocale($locale);
        } else {
            app()->setLocale(config('app.fallback_locale'));
        }

        $currentLocale = app()->getLocale() == 'en' ? '/en' :'';

        View::share('currentLocale', $currentLocale);
        return $next($request);
    }
}
