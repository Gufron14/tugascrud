<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [ProductsController::class,'welcome']);

Route::middleware(['auth'])->group(function () {
    Route::get('/index', [ProductsController::class, 'show'])->name('applications');

    // CRUD APLIKASI/PRODUK

    // Create
    Route::get('/add', [ProductsController::class, 'create']);
    Route::post('/store', [ProductsController::class, 'store']);
    Route::post('/add', [ProductsController::class, 'store'])->name('add.store');

    // Update
    Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductsController::class, 'update'])->name('products.update');


    // Delete
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');


    // CRUD KATEGORI

    // Create
    Route::get('/addCategory', [CategoryController::class, 'create'])->name('addCategory');
    Route::post('/store', [CategoryController::class, 'store']);
    Route::post('/addCategory', [CategoryController::class, 'store'])->name('addCategoty.store');

    // Update
    Route::get('/categories/{id}/editCategory', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.editCategory');

    // Delete
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    // CRUD KERANJANG
    Route::get('/carts', [CartsController::class, 'cartsPage'])->name('cartsPage');
});


// AUTH

// Login
Route::get('/auth', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('isGuest');
Route::post('/auth/doLogin', [AuthController::class, 'doLogin'])
    ->name('doLogin')
    ->middleware('isGuest');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// Register
Route::get('/auth/register', [AuthController::class, 'register'])
    ->name('register')
    ->middleware('isGuest');
Route::post('/auth/doRegister', [AuthController::class, 'doRegister'])
    ->name('doRegister')
    ->middleware('isGuest');








