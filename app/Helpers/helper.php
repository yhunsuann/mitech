<?php 

use App\Models\Menu;
use App\Repositories\MenuRepository;

if (!function_exists('render_link')) {    
    /**
     * render_link
     *
     * @param  mixed $langu
     * @return void
     */
    function render_link($langu = 'vi') {
        $lang = app()->getLocale();
     
        if ($langu != $lang) {
            $routers = [];

            $lang = request()->segment(1) ?? null;
            $menu_main = request()->segment(2) ?? null;
            $children_menu = request()->segment(3) ?? null;
            $menu_detail = request()->segment(4) ?? null;

            
            if (!in_array($lang, ['en', 'vi'])) {
                $menu_detail = $children_menu;
                $children_menu = $menu_main;
                $menu_main = $lang;
            }
     
            $lang = $lang == 'en' ? '' : 'en';
            if (!empty($lang)) {
                $routers[] = $lang;
            }
            
            if (!empty($menu_main)) {
                $menu = Menu::select('menus.id')->with('translate_other')->join('menu_translates', 'menu_translates.menu_id', 'menus.id')->where('slug', $menu_main)->first();
                $translate_other = optional($menu)->translate_other;
                if (!empty($translate_other)) {
                    $routers[] = $translate_other->slug;
                }
            }

            if (!empty($children_menu)) {
                $children_menu_id = Menu::select('menus.id')->with('translate_other')->join('menu_translates', 'menu_translates.menu_id', 'menus.id')->where('slug', $children_menu)->first();

                if(!empty($children_menu_id)){
                    $routers[] = $children_menu_id->translate_other->slug;
                } else{
                    $children_menu_id = resolve(MenuRepository::class)->getSlug($children_menu);
                    if(!empty($children_menu_id)){
                        $routers[] = $children_menu_id->slug;
                    }
                }
            }

            if (!empty($menu_detail)) {
                $menu_detail = resolve(MenuRepository::class)->getSlug($menu_detail);
                if(!empty($menu_detail)){
                    $routers[] = $menu_detail->slug;
                }
            }

            if (!empty($routers)) {
                return url(implode('/', $routers));
            }
            return url('');
        }
    }
}

if (!function_exists('get_link')) {    
    /**
     * get_link
     *
     * @param  mixed $slugs
     * @return void
     */
    function get_link($slugs, int|array $params) {
        $url = '';
        
        if (app()->getLocale() == 'en') {
            $url .= '/en';    
        }

        if (is_array($params)) {
            foreach ($params as $key => $param) {
                if(isset($slugs[$param])){
                    $url .= '/' . $slugs[$param] ?? ''; 
                } else {
                    $url .= '/' . $param ?? ''; 
                }
               
            }
        } else {
            $url .= '/' . $slugs[$params] ?? '';   
        }

        return $url;
    }
}

if (!function_exists('convert_price')) {
    
    /**
     * convert_price
     *
     * @param  mixed $number
     * @return void
     */
    function convert_price($number) {
        if ($number == (int)$number) {
            $formattedNumber = (int)$number;
        } else {
            $formattedNumber = $number;
        }
    
        return $formattedNumber;
    }
}

if (!function_exists('tabClass')) {
    function tabClass($errors) {
        if($errors->any()){
            $count = 0;
            foreach ($errors->getMessages() as $key => $errorMessages) {
                if (substr($key, -2) == '.0' && $key != 'price.0' && $key != 'thickness.0' && $key != 'width.0' && $key != 'height.0') {
                    $count ++;
                }       
            }
            if($count == 0){
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('changeTab')) {
    function changeTab($errors) {
        $active_tab = 'vi';
        if (tabClass($errors)) {
            $active_tab = 'en';
        }
        return $active_tab;
    } 
}




