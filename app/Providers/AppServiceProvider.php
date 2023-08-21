<?php

namespace App\Providers;

use App\Entities\DocumentTranslateRepository;
use App\Entities\DocumentTranslateRepositoryEloquent;
use App\Models\MeasurementProduct;
use App\Repositories\ArticleRepository;
use App\Repositories\ArticleRepositoryEloquent;
use App\Repositories\ArticleTranslateRepository;
use App\Repositories\ArticleTranslateRepositoryEloquent;
use App\Repositories\DocumentRepository;
use App\Repositories\DocumentRepositoryEloquent;
use App\Repositories\DocumentTranslatesRepository;
use App\Repositories\DocumentTranslatesRepositoryEloquent;
use App\Repositories\DocumenttReposity;
use App\Repositories\DocumenttReposityEloquent;
use App\Repositories\FAQRepository;
use App\Repositories\FAQRepositoryEloquent;
use App\Repositories\FAQTranslateRepository;
use App\Repositories\FAQTranslateRepositoryEloquent;
use App\Repositories\ReplacementRepository;
use App\Repositories\ReplacementRepositoryEloquent;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DistributorRepository;
use App\Repositories\DistributorRepositoryEloquent;
use App\Repositories\LanguageRepository;
use App\Repositories\LanguageRepositoryEloquent;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryEloquent;
use App\Repositories\ProductTranslateRepository;
use App\Repositories\ProductTranslateRepositoryEloquent;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\CategoryTranslateRepository;
use App\Repositories\CategoryTranslateRepositoryEloquent;
use App\Repositories\ConstantRepository;
use App\Repositories\ConstantRepositoryEloquent;
use App\Repositories\ConstantTranslateRepository;
use App\Repositories\ConstantTranslateRepositoryEloquent;
use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryEloquent;
use App\Repositories\FormReplacementRepository;
use App\Repositories\FormReplacementRepositoryEloquent;
use App\Repositories\MaterialRepository;
use App\Repositories\MaterialRepositoryEloquent;
use App\Repositories\MaterialTranslateRepository;
use App\Repositories\MaterialTranslateRepositoryEloquent;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Repositories\LibraryRepository;
use App\Repositories\LibraryRepositoryEloquent;
use App\Repositories\SliderRepository;
use App\Repositories\SliderRepositoryEloquent;
use App\Repositories\LibraryTranslateRepository;
use App\Repositories\LibraryTranslateRepositoryEloquent;
use App\Repositories\MeasurementProductRepository;
use App\Repositories\MeasurementProductRepositoryEloquent;
use App\Repositories\MenuRepository;
use App\Repositories\MenuRepositoryEloquent;
use App\Repositories\FormDistributorRepository;
use App\Repositories\FormDistributorRepositoryEloquent;
use App\Repositories\FormNewRepository;
use App\Repositories\FormNewRepositoryEloquent;
use App\Repositories\FormProductRepository;
use App\Repositories\FormProductRepositoryEloquent;
use App\Repositories\IntroductionRepository;
use App\Repositories\IntroductionRepositoryEloquent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            DistributorRepository::class, DistributorRepositoryEloquent::class
        );

        $this->app->bind(
            LanguageRepository::class, LanguageRepositoryEloquent::class
        );
        
        $this->app->bind(
            ProductRepository::class,ProductRepositoryEloquent::class
        );

        $this->app->bind(
            ProductTranslateRepository::class, ProductTranslateRepositoryEloquent::class
        );

        $this->app->bind(
            ContactRepository::class, ContactRepositoryEloquent::class
        );

        $this->app->bind(
            ConstantRepository::class, ConstantRepositoryEloquent::class
        );
        
        $this->app->bind(
            ConstantTranslateRepository::class, ConstantTranslateRepositoryEloquent::class
        );

        $this->app->bind(
            CategoryRepository::class, CategoryRepositoryEloquent::class
        );
        
        $this->app->bind(
            CategoryTranslateRepository::class, CategoryTranslateRepositoryEloquent::class
        );
        
        $this->app->bind(
            MenuRepository::class, MenuRepositoryEloquent::class
        );
        
        $this->app->bind(
            FormDistributorRepository::class, FormDistributorRepositoryEloquent::class
        );
        
        $this->app->bind(
            FormProductRepository::class, FormProductRepositoryEloquent::class
        );

        $this->app->bind(
            MaterialRepository::class, MaterialRepositoryEloquent::class
        );
        $this->app->bind(
            MaterialTranslateRepository::class, MaterialTranslateRepositoryEloquent::class
        );
    }
    
    public function boot(Request $request)
    {
        Paginator::useBootstrap();  

        app()->bind(FAQRepository::class, FAQRepositoryEloquent::class);
        app()->bind(FAQTranslateRepository::class, FAQTranslateRepositoryEloquent::class);
        app()->bind(LanguageRepository::class, LanguageRepositoryEloquent::class);
        app()->bind(LibraryRepository::class, LibraryRepositoryEloquent::class);
        app()->bind(SliderRepository::class, SliderRepositoryEloquent::class);
        app()->bind(LibraryTranslateRepository::class, LibraryTranslateRepositoryEloquent::class);
        app()->bind(DocumentRepository::class, DocumentRepositoryEloquent::class);
        app()->bind(DocumentTranslatesRepository::class, DocumentTranslatesRepositoryEloquent::class);
        app()->bind(ArticleRepository::class, ArticleRepositoryEloquent::class);
        app()->bind(ArticleTranslateRepository::class, ArticleTranslateRepositoryEloquent::class);
        app()->bind(MeasurementProductRepository::class, MeasurementProductRepositoryEloquent::class);
        app()->bind(MenuRepository::class, MenuRepositoryEloquent::class);
        app()->bind(FormReplacementRepository::class, FormReplacementRepositoryEloquent::class);
        app()->bind(FormNewRepository::class, FormNewRepositoryEloquent::class);
        app()->bind(IntroductionRepository::class, IntroductionRepositoryEloquent::class);
    }
}
