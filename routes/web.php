<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\ContactController;
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
})->name('home');

Route::get('/about-us', function () {
    return view('about-us');   // If it's resources/views/about-us.blade.php
}) ->name('about-us');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');


Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category:slug}/{subCategory:slug}', [CategoryController::class, 'showSubCategory'])->name('subcategories.show');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
Route::post('/basket/update/{id}', [BasketController::class, 'updateQuantity'])->name('basket.update');
Route::post('/basket/remove/{id}', [BasketController::class, 'remove'])->name('basket.remove');


Route::get('/checkout', function () {

    $basket = session('basket', []);

    $subtotal = collect($basket)->sum(function ($item) {
        return ($item['price'] ?? 0) * ($item['quantity'] ?? 1);
    });

    return view('payments.Checkout', [
        'basket' => $basket,
        'subtotal' => $subtotal,
    ]);
});


require __DIR__.'/auth.php';
