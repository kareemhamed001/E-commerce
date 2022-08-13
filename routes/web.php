<?php

use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdctController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [\App\Http\Controllers\Frontend\FrontendController::class,'index'])->middleware('auth');
Route::get('/collections', [\App\Http\Controllers\Frontend\FrontendController::class,'categories'])->middleware('auth');
Route::get('collections/{category_slug}', [\App\Http\Controllers\Frontend\FrontendController::class,'products'])->middleware('auth');
Route::get('collections/{category_slug}/{product_slug}', [\App\Http\Controllers\Frontend\FrontendController::class,'productView'])->middleware('auth');


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('dashboard',[DashboardController::class, 'index']);

    Route::controller(categoryController::class)->group(function (){
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category', 'store');

        Route::get('category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
    });

    Route::get('brands',\App\Http\Livewire\Admin\Brand\Index::class);

    Route::get('products', \App\Http\Livewire\Admin\Product\Index::class);
    Route::controller(ProdctController::class)->group(function (){
        Route::get('product/create', 'create');
        Route::put('product/create', 'store');
        Route::get('product/{product}/edit', 'edit');
        Route::put('product/{product}', 'update');
        Route::post('product-color/{color_id}', 'updataColorQuantity');
        Route::get('product-image/{product_image_id}/delete', 'destroyImage');
    });

    Route::controller(ColorController::class)->group(function (){

        Route::get('colors','index');
        Route::get('color/create', 'create');
        Route::post('color/create', 'store');
        Route::get('color/{color}/edit', 'edit');
        Route::put('color/create/{color}', 'update');
        Route::delete('colors/{id}','destroy');
    });

    Route::get('sliders', \App\Http\Livewire\Admin\Slider\Index::class);
    Route::controller(SliderController::class)->group(function (){

//        Route::get('sliders','index');
        Route::get('slider/create', 'create');
        Route::post('slider/create', 'store');
        Route::get('slider/{slider}/edit', 'edit');
        Route::put('slider/create/{slider}', 'update');
        Route::delete('slider/{id}','destroy');
    });


});
