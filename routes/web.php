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

Route::get('/',[\App\Http\Controllers\DashboardController::class,'Dashboard'])->middleware('abc');

Route::get('/logout',[\App\Http\Controllers\LoginController::class,'Logout']);
Route::get('/login',[\App\Http\Controllers\LoginController::class,'Login'])->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'Login']);
Route::get('/deleteImage/{id}',[\App\Http\Controllers\ProductsController::class,'DeleteImage']);

Route::prefix('products')->group(function () {
    Route::get('/',[\App\Http\Controllers\ProductsController::class,'ListProducts'])->middleware('abc');
    Route::get('/editProduct/{id}',[\App\Http\Controllers\ProductsController::class,'EditProduct'])->middleware('abc');
    Route::post('/editProduct/{id}',[\App\Http\Controllers\ProductsController::class,'EditProduct'])->middleware('abc');
    Route::post('/addProduct',[\App\Http\Controllers\ProductsController::class,'AddProduct'])->middleware('abc');
    Route::get('/addProduct',[\App\Http\Controllers\ProductsController::class,'AddProduct'])->middleware('abc');

});



