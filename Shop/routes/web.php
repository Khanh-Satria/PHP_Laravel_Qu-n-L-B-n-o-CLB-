<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\SupplierController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('destroy/{id}', [CategoryController::class, 'dele']);
Route::prefix('admin')->group(function () {

    Route::get('/', [MainController::class, 'index'])->name('admin');
   

    #Product
    Route::prefix('products')->group(function(){

     Route::get('list',[ProductController::class, 'index']);
     Route::get('add',[ProductController::class, 'create']);
    });


    #Category
    Route::prefix('categories')->group(function(){
        Route::get('add',[CategoryController::class, 'create']); //form tạo mới
        Route::post('add',[CategoryController::class, 'store']); // xử lý tạo mới
        Route::get('list',[CategoryController::class, 'index']); 
        Route::DELETE('destroy', [CategoryController::class, 'destroy']);
       });

    #Promotion
    Route::prefix('promotions')->group(function(){
        Route::get('add',[PromotionController::class, 'create']);
        Route::post('add',[PromotionController::class, 'store']); // xử lý tạo mới
        Route::get('list',[PromotionController::class, 'index']); 
        Route::DELETE('destroy', [PromotionController::class, 'destroy']);
       });


    #Supplier
    Route::prefix('supplier')->group(function(){
       
        Route::get('list',[SupplierController::class, 'index']); 
        
       });

    #Order
    Route::prefix('order')->group(function(){
       
        Route::get('list',[OrderController::class, 'index']); 
        
       });

    #Import
    Route::prefix('import')->group(function(){
       
        Route::get('list',[ImportController::class, 'index']); 
        
       });

    #Statistic
    Route::prefix('statistic')->group(function(){
       
        Route::get('bytime',[StatisticController::class, 'index']); 
        
       });
});