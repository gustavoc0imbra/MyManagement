<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.index');
    Route::get('/addcategory', 'create')->name('category.create');
    Route::post('/addcategory', 'store')->name('category.store');
    /*Route::get('/category/{id}', 'show')->name('category.show');*/
    Route::get('/category/{id}', 'edit')->name('category.edit');
    Route::put('/category/{id}', 'update')->name('category.update');
    Route::delete('/category/{id}', 'destroy')->name('category.destroy');
});

Route::controller(ProductController::class)->group(function () {
   Route::get('/product', 'index')->name('product.index');
   Route::get('/addProduct', 'create')->name('product.create');
   Route::post('addProduct', 'store')->name('product.store');
   Route::get('/product/{id}', 'edit')->name('product.edit');
   Route::put('/product/{id}', 'update')->name('product.update');
   Route::delete('/product/{id}', 'destroy')->name('product.destroy');
});

require __DIR__.'/auth.php';
