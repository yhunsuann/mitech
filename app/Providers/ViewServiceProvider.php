<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MenuRepository;
use Illuminate\Support\Facades\View;
use App\Repositories\ConstantRepository;

class ViewServiceProvider extends ServiceProvider
{    
    /**
     * boot
     *
     * @return void
     */
    public function boot()
    {
        $this->composeMenus();
    }
    
    /**
     * register
     *
     * @return void
     */
    public function register()
    {
        //
    }
    
    /**
     * composeMenus
     *
     * @return void
     */
    private function composeMenus()
    {
        view()->composer('*', function ($view) {
            $locale = app()->getLocale();
            $menus = resolve(MenuRepository::class)->getList($locale);
            $slugs = resolve(MenuRepository::class)->getAllSlugs($locale);
            $trans = resolve(ConstantRepository::class)->getByLang($locale);

            $view->with('menus', $menus)
                ->with('trans', $trans)
                ->with('slugs', $slugs);
        });
    }
}
