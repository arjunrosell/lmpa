<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientBrandController;

use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Client\ClientSalesController;
use App\Http\Controllers\Client\ClientReportController;
use App\Http\Controllers\Client\ClientProductController;
use App\Http\Controllers\Client\ClientCategoryController;
use App\Http\Controllers\Client\ClientSupplierController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientAccountSettingsController;

// Client routes
Route::middleware(['auth', 'verified', 'role:client', 'throttle:global'])->group(function () {

    Route::get('/client', [ClientDashboardController::class, 'index'])->name('client.index');

    // Product Management Routes
    Route::get('/client/products', [ClientProductController::class, 'index'])->name('client.products.index');
    Route::get('/client/products/{product}', [ClientProductController::class, 'show'])->name('client.products.show');

    // Brand Management Routes
    Route::get('/client/brands', [ClientBrandController::class, 'index'])->name('client.brands.index');

    // Category Management Routes
    Route::get('/client/categories', [ClientCategoryController::class, 'index'])->name('client.categories.index');

    // Supplier Management Routes
    Route::get('/client/suppliers', [ClientSupplierController::class, 'index'])->name('client.suppliers.index');

    // sale Management Routes
    Route::get('/client/sales', [ClientSalesController::class, 'index'])->name('client.sales.index');
    Route::get('/client/sales/{sale}', [ClientSalesController::class, 'show'])->name('client.sales.show');

    // Account Management Routes
    Route::get('/client/account', [ClientAccountSettingsController::class, 'edit'])->name('client.account.edit');
    Route::put('/client/account', [ClientAccountSettingsController::class, 'update'])->name('client.account.update');

    // Staff Reports
    Route::get('/client/reports/sales',     [ClientReportController::class, 'sales'])->name('client.reports.sales');
});
