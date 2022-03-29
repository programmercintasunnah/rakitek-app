<?php

use App\Http\Controllers\ProductsController;
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

Auth::routes();

Route::delete('products/deleteKategori/{id}',[ProductsController::class,'deleteKategori']);
Route::get('products/editKategori',[ProductsController::class,'editKategori']);
Route::post('kategori/updateKategori',[ProductsController::class,'kategoriUpdate'])->name('kategori.update');
Route::post('kategori',[ProductsController::class,'kategoriStore'])->name('kategori.store');

Route::delete('products/deleteProduk/{id}',[ProductsController::class,'deleteProduk']);
Route::get('products/editProduk',[ProductsController::class,'editProduk']);
Route::post('products/updateProduk',[ProductsController::class,'updateProduk'])->name('produk.update');
Route::resource('products', ProductsController::class);