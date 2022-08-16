<?php

use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdctController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',\App\Http\Livewire\FrontEnd\Index::class)->middleware('auth');
Route::get('/profile',\App\Http\Livewire\FrontEnd\Profile\Index::class)->middleware('auth');
Route::post('/profile/{user}',[\App\Http\Controllers\profileController::class,'updateImage'])->middleware('auth');
Route::get('cart',\App\Http\Livewire\FrontEnd\Cart\Index::class)->middleware('auth');
Route::get('/collections', [\App\Http\Controllers\Frontend\FrontendController::class,'categories'])->middleware('auth');
Route::get('collections/{category_slug}', [\App\Http\Controllers\Frontend\FrontendController::class,'products'])->middleware('auth');
Route::get('search', [\App\Http\Controllers\Frontend\FrontendController::class,'search'])->middleware('auth');
Route::get('collections/{category_slug}/{product_slug}', [\App\Http\Controllers\Frontend\FrontendController::class,'productView'])->middleware('auth');

