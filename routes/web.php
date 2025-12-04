<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

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

Route::get('/womens', function () {
    return view('womens');
});

Route::get('/technology', function () {
    return view('technology');
});

Route::get('/mens', function () {
    return view('mens');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/accessories', function () {
    return view('accessories');
});

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

// Process checkout
Route::post('/checkout', [CheckoutController::class, 'process'])
    ->name('checkout.process');

require __DIR__.'/auth.php';
