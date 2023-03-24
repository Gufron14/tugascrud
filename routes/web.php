<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductsController::class, 'index']);

// CRUD APLIKASI/PRODUK

// Create
Route::get('/add', [ProductsController::class, 'create']);
Route::post('/store', [ProductsController::class, 'store']);
Route::post('/add', [ProductsController::class, 'store'])->name('add.store');

// Update
Route::get('/edit/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/product/{id}', [ProductsController::class, 'update'])->name('products.update');

// Delete
Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');


// CRUD KATEGORI

// Create
Route::get('/addCategory', [CategoryController::class, 'create']);
Route::post('/store', [CategoryController::class, 'store']);
Route::post('/addCategory', [CategoryController::class, 'store'])->name('addCategoty.store');

// Update
Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/product/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/form-submit', [CategoryController::class, 'submit'])->name('form.submit');

// Delete
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');


// CRUD KERANJANG

// Create
Route::get('/carts', [CartsController::class, 'create']);
Route::post('/store', [CartsController::class, 'store']);
