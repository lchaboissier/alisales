<?php

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

// Route::redirect('/', 'login');
Route::get('/', function () {
    return redirect(route('login'));
});

\Illuminate\Support\Facades\Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::get('customer/{customer}/delete',[\App\Http\Controllers\CustomerController::class,'delete'])->name('customer.delete');
    Route::get('customer/{customer}/createOrder',[\App\Http\Controllers\CustomerController::class,'createOrder'])->name('customer.createOrder');
    Route::get('customer/{customer}/storeOrder',[\App\Http\Controllers\CustomerController::class,'storeOrder'])->name('customer.storeOrder');


    Route::resource('order', \App\Http\Controllers\OrderController::class);

    Route::get('order/{order}/delete',[\App\Http\Controllers\OrderController::class,'delete'])->name('order.delete');

    Route::resource('category', \App\Http\Controllers\CategoryController::class);

    Route::resource('product', \App\Http\Controllers\ProductController::class);
    Route::get('product/ref/{ref}',[\App\Http\Controllers\ProductController::class,'getByRef'])->name('product.getByRef');
});


