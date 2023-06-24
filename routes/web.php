<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/shop', [APIController::class, 'getProducts']);
Route::get('/shopping-cart', [APIController::class, 'showCart']);

// route cart
Route::get('add-to-cart/{id}', [App\Http\Controllers\APIController::class, 'getAddToCart']);	
Route::get('del-cart/{id}', [App\Http\Controllers\APIController::class, 'getDelItemCart']);	
	
// Route::get('del-cart/{id}', [App\Http\Controllers\PageController::class, 'getDelItemCart'])->name('xoagiohang');
