<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\SliderRepository;
use App\Models\Menu;

class HomeController extends Controller
{    
    /**
     * productRepository
     *
     * @var mixed
     */
    protected $productRepository;
        
    /**
     * articleRepository
     *
     * @var mixed
     */
    protected $articleRepository;
    
    /**
     * categoryRepository
     *
     * @var mixed
     */
    protected $categoryRepository;
    
    /**
     * sliderRepository
     *
     * @var mixed
     */
    protected $sliderRepository;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        ProductRepository $productRepository,
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository,
        SliderRepository $sliderRepository
    ) {
        $this->productRepository = $productRepository;
        $this->articleRepository = $articleRepository;
        $this->categoryRepository = $categoryRepository;
        $this->sliderRepository = $sliderRepository;
    }
    
    /**
     * getIndex
     *
     * @return void
     */
    public function getIndex()
    {
        $products = $this->productRepository->getList();
        $categories = $this->categoryRepository->getList(['type' => 'product']);
        $articles = $this->articleRepository->getList([], 'news');
        $sliders = $this->sliderRepository->getAll();

        return view('client.index', compact(['products', 'articles', 'categories', 'sliders']));
    }
    
    /**
     * redirectMenu
     *
     * @param  mixed $request
     * @return void
     */
    public function redirectMenu(Request $request) {
        $lang = $request->route('lang');
        $menu_main = $request->route('menu_main');
        $children_menu = $request->route('children_menu');
        $menu_detail = $request->route('menu_detail');
        
        if (!in_array($lang, ['en', 'vi'])) {
            $menu_detail = $children_menu;
            $children_menu = $menu_main;
            $menu_main = $lang;
        }

        $menu = Menu::select('menus.id', 'menu_name')->join('menu_translates', 'menu_translates.menu_id', 'menus.id')->where('slug', $menu_main)->first();
        $controller = '';
        if (empty($menu_main) || empty($menu)) {
            $controller = resolve(HomeController::class);
        } else {
            switch ($menu->id) {
                case 2:
                    $controller = resolve(AboutUsController::class);
                    break;
                case 3:
                    $controller = resolve(ProductController::class);
                    break;
                case 4:
                    $controller = resolve(ResourcesController::class);
                    break;  
                case 5:
                    $controller = resolve(DistributorController::class);
                    break;   
                case 6:
                    $controller = resolve(NewsController::class);
                    break; 
                case 7:
                    $controller = resolve(ContactController::class);
                    break; 
                case 8:
                    $controller = resolve(ProductController::class);
                    break;     
                default:
                    # code...
                    break;
            }
        }

        if (!empty($menu_detail)) {
            $child_menu = Menu::select('menus.id', 'menu_name')->join('menu_translates', 'menu_translates.menu_id', 'menus.id')->where('slug', $children_menu)->first();
            if (!empty($child_menu)) {
                $detail = [
                    8 =>  'getDetailProducts',
                    9 =>  'getDetailFaq',
                    10 => 'getDetailWarrantyInformation',
                    11 => 'getDetailDocumentsfiles',
                    12 => 'getDetailMaterialCostEstimation',
                    13 => 'getDetailCeilingsLibrary',
                    14 => 'getDetailTechincalInformation',
                    15 => 'getDetailInstallationGuide',
                    16 => 'getDetailZeitGypsumIdentification',
                ][$child_menu->id];

                return $controller->$detail($request, $menu_detail);
            } abort(404);
        } elseif (!empty($children_menu)) {
            $child_menu = Menu::select('menus.id', 'menu_name')->join('menu_translates', 'menu_translates.menu_id', 'menus.id')->where('slug', $children_menu)->first();
            if (!empty($child_menu)) {
                $childrens = [
                    8 =>  'getProducts',
                    9 =>  'getFaq',
                    10 => 'getWarrantyInformation',
                    11 => 'getDocumentsfiles',
                    12 => 'getMaterialCostEstimation',
                    13 => 'getCeilingsLibrary',
                    14 => 'getTechincalInformation',
                    15 => 'getInstallationGuide',
                    16 => 'getZeitGypsumIdentification',
                    17 => 'getWarrantyPolicyForm',
                    18 => 'getDetail',
                ][$child_menu->id];

                return $controller->$childrens($request);
            } else {
                return $controller->getDetail($request, $children_menu);
            }
        } else {
            return $controller->getIndex();
        }
    }
}
