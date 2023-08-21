<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\DistributorFormController;
use App\Http\Controllers\Admin\ProductFormController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LibraryController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ReplacementFormController;
use App\Http\Controllers\Admin\FormNewController;
use App\Http\Controllers\Admin\SliderController;

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
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

Route::get('login',[AuthController::class, 'login'])->name('login');
Route::post('login',[AuthController::class, 'loginProcess'])->name('login.process');

Route::group(['middleware' => 'check-login'], function() {
    Route::get('', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create'); 
        Route::post('create', [ProductController::class, 'store'])->name('store');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('deletes', [ProductController::class, 'deletes'])->name('deletes');

        Route::get('form', [ProductFormController::class, 'formProduct'])->name('form');
        Route::get('form/delete/{id}', [ProductFormController::class, 'deleteProduct'])->name('deleteProduct');
    });

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create'); 
        Route::post('create', [CategoryController::class, 'store'])->name('store');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::post('deletes', [CategoryController::class, 'deletes'])->name('deletes');
    });

    Route::group(['prefix' => 'distributor', 'as' => 'distributor.'], function () {
        Route::get('', [DistributorController::class, 'index'])->name('index');
        Route::get('create', [DistributorController::class, 'create'])->name('create');
        Route::post('create', [DistributorController::class, 'store'])->name('store');
        Route::post('deletes', [DistributorController::class, 'deletes'])->name('deletes');
        Route::get('delete/{id}', [DistributorController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [DistributorController::class, 'edit'])->name('edit');
        Route::post('edit/{id}', [DistributorController::class, 'update'])->name('update');

        Route::get('form', [DistributorFormController::class, 'formDistributor'])->name('form');
        Route::get('form/delete/{id}', [DistributorFormController::class, 'deleteDistributor'])->name('deleteDistributor');
    });

    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('',[ContactController::class, 'index'])->name('index');
        Route::get('delete/{id}',[ContactController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'config', 'as' => 'config.'], function () {
        Route::get('',[ContactController::class, 'config'])->name('index');
        Route::post('', [ContactController::class, 'configProcess'])->name('config.process');
    });

    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('', [FaqController::class, 'index'])->name('index');
        Route::get('create', [FaqController::class, 'create'])->name('create'); 
        Route::post('create', [FaqController::class, 'store'])->name('store');
        Route::get('delete/{id}', [FaqController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [FaqController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [FaqController::class, 'update'])->name('update');
    });
    
    Route::group(['prefix' => 'library', 'as' => 'library.'], function () {
        Route::get('', [LibraryController::class, 'index'])->name('index');
        Route::get('create', [LibraryController::class, 'create'])->name('create'); 
        Route::post('create', [LibraryController::class, 'store'])->name('store');
        Route::get('delete/{id}', [LibraryController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [LibraryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [LibraryController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
        Route::get('', [SliderController::class, 'index'])->name('index');
        Route::get('create', [SliderController::class, 'create'])->name('create'); 
        Route::post('create', [SliderController::class, 'store'])->name('store');
        Route::get('delete/{id}', [SliderController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [SliderController::class, 'edit'])->name('edit');
        Route::post('edit/{id}', [SliderController::class, 'update'])->name('update');
    });
    
    Route::group(['prefix' => 'document', 'as' => 'document.'], function () {
        Route::get('', [DocumentController::class, 'index'])->name('index');
        Route::get('create', [DocumentController::class, 'create'])->name('create'); 
        Route::post('create', [DocumentController::class, 'store'])->name('store');
        Route::get('delete/{id}', [DocumentController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [DocumentController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [DocumentController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
        Route::group(['prefix' => 'about-us', 'as' => 'about-us.'], function () {
            Route::get('', [ArticleController::class, 'aboutUs'])->name('form');
            Route::post('', [ArticleController::class, 'aboutUsProcess'])->name('form.process');
        });

        Route::get('{segment}', [ArticleController::class, 'index'])->name('index');
        Route::get('{segment}/create', [ArticleController::class, 'create'])->name('create'); 
        Route::post('{segment}/create', [ArticleController::class, 'store'])->name('store');
        Route::get('{segment}/delete/{id}', [ArticleController::class, 'delete'])->name('delete');
        Route::get('{segment}/edit/{id}', [ArticleController::class, 'edit'])->name('edit');
        Route::post('{segment}/update/{id}', [ArticleController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'warranty', 'as' => 'warranty.'], function () {
        Route::get('',[ReplacementFormController::class, 'index'])->name('index');
        Route::get('delete/{id}',[ReplacementFormController::class, 'delete'])->name('delete');
    });
    
    Route::group(['prefix' => 'material', 'as' => 'material.'], function () {
        Route::get('', [MaterialController::class, 'index'])->name('index');
        Route::get('create', [MaterialController::class, 'create'])->name('create'); 
        Route::post('create', [MaterialController::class, 'store'])->name('store');
        Route::get('delete/{id}', [MaterialController::class, 'delete'])->name('delete');
        Route::get('edit/{id}', [MaterialController::class, 'edit'])->name('edit');
        Route::post('edit/{id}', [MaterialController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'new', 'as' => 'form-new.'], function () {
        Route::get('form-new', [FormNewController::class, 'index'])->name('index');
        Route::get('form-new/delete/{id}', [FormNewController::class, 'delete'])->name('delete');
    }); 
});
