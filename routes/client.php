<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientProductController;

// Client routes
Route::middleware(['auth', 'verified', 'role:client'])->group(function () {
    Route::get('/client', [ClientDashboardController::class, 'index'])->name('client.index');

    // Product Management Routes
    Route::get('/client/products', [ClientProductController::class, 'index'])->name('client.products.index');
    Route::get('/client/products/create', [ClientProductController::class, 'create'])->name('client.products.create');
    Route::get('/client/products/{product}', [ClientProductController::class, 'show'])->name('client.products.show');


    // Order Management Routes
    Route::get('/client/orders', [ClientProductController::class, 'index'])->name('client.orders.index');
    Route::get('/client/orders/create', [ClientProductController::class, 'create'])->name('client.orders.create');
    Route::post('/client/orders', [ClientProductController::class, 'store'])->name('client.orders.store');
    Route::get('/client/orders/{order}', [ClientProductController::class, 'show'])->name('client.orders.show');
    Route::get('/client/orders/{order}/edit', [ClientProductController::class, 'edit'])->name('client.orders.edit');
    Route::put('/client/orders/{order}', [ClientProductController::class, 'update'])->name('client.orders.update');
});
