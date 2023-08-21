<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class BaseURLComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $currentURL = url()->current();
            $lastSlashPos = strrpos($currentURL, '/');
            $PreURL = substr($currentURL, 0, $lastSlashPos);

            $secondLastSlashPos = strrpos(substr($currentURL, 0, $lastSlashPos - 1), '/');
            $baseURL = substr($currentURL, 0, $secondLastSlashPos);
   
            $view->with(['PreURL' =>  $PreURL, 'baseURL' =>  $baseURL ]);
        });
    }
}
