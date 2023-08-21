<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\DistributorController;
use App\Http\Controllers\Client\DistributorFormController;
use App\Http\Controllers\Client\ProductFormController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\NewsController;
use App\Http\Controllers\Client\ReplacementFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'contact-us', 'as' => 'contact-us.'], function () {
    Route::post('api/v1/contact', [ContactController::class, 'submitContact']);
});

Route::group(['prefix' => 'products-solutions', 'as' => 'products-solutions.'], function () {
    Route::post('api/v1/products', [ProductFormController::class, 'submitProduct']);
    Route::post('get-list', [ProductController::class, 'getListProducts']);
});

Route::group(['prefix' => 'resources', 'as' => 'resources.'], function () {
    Route::post('api/v1/warranty-policy-form', [ReplacementFormController::class, 'submitWarranty']);
});

Route::group(['prefix' => 'new', 'as' => 'new.'], function () {
    Route::post('api/v1/new-form', [NewsController::class, 'submitNew']);
});

Route::group(['prefix' => 'where-to-buy', 'as' => 'where-to-buy.'], function () {
    Route::post('api/v1/distributors', [DistributorFormController::class, 'submitDistributor']);
    Route::get('distributors', [DistributorController::class, 'getDistributors']);
    Route::get('data', [DistributorController::class, 'getData']);
});

Route::group(['prefix' => '{lang?}','where' => ['locale' => '[a-zA-Z]{2}']], function () {
    Route::group(['prefix' => '{menu_main?}'], function () {
        Route::group(['prefix' => '{children_menu?}'], function () {
            Route::get('{menu_detail?}', [HomeController::class, 'redirectMenu'])->name('menu');
        }); 
    });  
});
