<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

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
    $products = Product::all();
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/cartStore', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart', [CartController::class, 'create'])->name('cart');
    Route::patch('/cart/{id}/increase', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::patch('/cart/{id}/decrease', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
    Route::get('/transaction', [TransactionController::class, 'create'])->name('TransactionPage');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('TransactionDone');

    Route::get('/AdminPanel',[ProductController::class, 'admin'])->name('AdminPanel');
    Route::get('/AddProductForm', [ProductController::class, 'create'])->name('AddProductForm');
    Route::post('/AddProduct', [ProductController::class, 'store'])->name('AddProduct');
    Route::get('/UpdateProductForm/{id}', [ProductController::class, 'edit'])->name('UpdateProductForm');
    Route::patch('/UpdateProduct/{id}', [ProductController::class, 'update'])->name('UpdateProduct');
    Route::delete('/DeleteProduct/{id}', [ProductController::class, 'destroy'])->name('DeleteProduct');
});



require __DIR__.'/auth.php';
