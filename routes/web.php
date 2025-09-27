<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsControllers;
use App\Http\Controllers\AdminControllers;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/datatable', function () {
    return view('test');
});
    //Admin Controllers
Route::get('/admin', [AdminControllers::class, 'index']);
Route::get('/products', [AdminControllers::class, 'products']);
Route::post('/products/{id}/toggle', [AdminControllers::class, 'activate'])->name('products.toggle');

    //Products Controllers
Route::get('/landingpage',[ProductsControllers::class, 'index']);
Route::get('/viewdetail/{id}',[ProductsControllers::class, 'view']);
Route::post('/create/product',[ProductsControllers::class,'create']);
Route::get('/edit/product/{id}',[ProductsControllers::class, 'edit']);
Route::get('/remove/products/{id}',[ProductsControllers::class,'delete']);


