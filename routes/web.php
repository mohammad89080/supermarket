<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;
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
Route::resource('products' ,ProductController::class);
Route::get('product/soft/delete/{id}',[ProductController::class,'softDelete'])->name('soft.delete');
Route::get('product/trash',[ProductController::class,'trashedProducts'])->name('product.trash');
Route::get('product/back/from/soft/delete/{id}',[ProductController::class,'backSoftDelete'])
    ->name('product.backTrash');
Route::get('product/delate/from/database/{id}',[ProductController::class,'deleteForEver'])
    ->name('product.deletefForEver');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
