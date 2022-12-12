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

Route::get('/login',[\App\Http\Controllers\LoginController::class,'Login'])->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'Login']);

Route::prefix('products')->group(function () {
    Route::get('/addProduct',[\App\Http\Controllers\ProductsController::class,'AddProduct'])->middleware('abc');

});



