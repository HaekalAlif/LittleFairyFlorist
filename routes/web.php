<?php

use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Route untuk SPA
Route::get('/', function () {
    return view('app');
});

// Route untuk autentikasi
Route::middleware(['web'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// Route untuk API dengan middleware sanctum
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', function (Request $request) {
        auth()->guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logged out successfully']);
    });

    // Route untuk orders
    Route::get('/orders', [OrderController::class, 'index']);
    Route::put('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    // Route untuk manajemen produk
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::get('/products/{id}', [ProductController::class, 'show']);

    //Route untuk manajemen testimoni
    Route::get('/testimonials', [TestimonialController::class, 'index']);
    Route::post('/testimonials', [TestimonialController::class, 'store']);
    Route::get('/testimonials/{id}', [TestimonialController::class, 'show']);
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update']);
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy']);
});

// Catch-all route untuk SPA harus berada di paling bawah
Route::get('/{pathMatch}', function () {
    return view('app');
})->where('pathMatch', ".*");

// route untuk order user
Route::post('/orders', [OrderController::class, 'store']);

// route untuk menampilkan product
Route::get('/products', [ProductController::class, 'index']);

// Route untuk mengambil data testimonial
Route::get('/testimonials', [TestimonialController::class, 'index']);