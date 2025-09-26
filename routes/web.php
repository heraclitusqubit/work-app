<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsControllers;
use App\Http\Controllers\AdminControllers;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/products', function () {
//     return view('admin.products');
// });

// Route::get('/landingpage', function () {
//     return view('index');
// });
    //Admin Controllers
Route::get('/admin', [AdminControllers::class, 'index']);
Route::get('/products', [AdminControllers::class, 'products']);

    //Products Controllers
Route::get('/landingpage',[ProductsControllers::class, 'index']);
Route::get('/viewdetail/{id}',[ProductsControllers::class, 'view']);
Route::post('/create/product',[ProductsControllers::class,'create']);

// Route::get('/produk',[ProdukController::class,'index']);
// Route::get('/add-produk',[ProdukController::class,'add']);
// Route::post('/update/produk/{id}',[ProdukController::class,'update']);
// Route::get('/delete-produk/{id}',[ProdukController::class,'delete']);

