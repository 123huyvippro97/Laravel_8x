<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Menu\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
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
Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);

//Route::get('admin/main', [MainController::class,'index'])->name('admin')->middleware('auth');
Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function (){
        Route::get('/', [MainController::class,'index'])->name('admin');
        Route::get('main', [MainController::class,'index']);
        #menus
        Route::prefix('menus')->group(function (){
            Route::get('add',[MenuController::class,'create']);
            Route::post('add',[MenuController::class,'store']);
            Route::get('list',[MenuController::class,'index']);
            Route::delete('destroy',[MenuController::class,'destroy']);
            Route::get('edit/{menu}',[MenuController::class,'show']);
            Route::post('edit/{menu}',[MenuController::class,'update']);
        });
        #Product
        Route::prefix('products')->group(function (){
            Route::get('list',[ProductController::class,'index']);
            Route::get('add',[ProductController::class,'create']);
            Route::get('edit/{product}',[ProductController::class,'show']);
            Route::post('add',[ProductController::class,'store']);
            Route::post('edit/{product}',[ProductController::class,'update']);
            Route::delete('destroy',[ProductController::class,'destroy']);
        });

        #Slider
        Route::prefix('sliders')->group(function (){
            Route::get('list',[SliderController::class,'index']);
            Route::get('add',[SliderController::class,'create']);
            Route::get('edit/{slider}',[SliderController::class,'show']);
            Route::post('add',[SliderController::class,'store']);
            Route::post('edit/{slider}',[SliderController::class,'update']);
            Route::delete('destroy',[SliderController::class,'destroy']);
        });

        #Upload
        Route::post('upload/services',[UploadController::class,'store']);
    });
});
// Tim hieu ve routing laravel


/*xu ly frontend*/
Route::get('/', [\App\Http\Controllers\MainController::class,'index']);
