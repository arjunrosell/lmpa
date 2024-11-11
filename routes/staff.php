<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\StaffUserController;
use App\Http\Controllers\Staff\StaffBrandController;
use App\Http\Controllers\Staff\StaffSalesController;
use App\Http\Controllers\Staff\StaffProductController;
use App\Http\Controllers\Staff\StaffCategoryController;
use App\Http\Controllers\Staff\StaffSupplierController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Staff\StaffAccountSettingsController;
use App\Http\Controllers\Staff\StaffReportController;

// Staff routes
Route::middleware(['auth', 'verified', 'role:staff'])->group(function () {
    Route::get('/staff', [StaffDashboardController::class, 'index'])->name('staff.index');


    // Product Management Routes
    Route::get('/staff/products', [StaffProductController::class, 'index'])->name('staff.products.index');
    Route::get('/staff/products/create', [StaffProductController::class, 'create'])->name('staff.products.create');
    Route::post('/staff/products', [StaffProductController::class, 'store'])->name('staff.products.store');
    Route::get('/staff/products/{product}', [StaffProductController::class, 'show'])->name('staff.products.show');
    Route::get('/staff/products/{product}/edit', [StaffProductController::class, 'edit'])->name('staff.products.edit');
    Route::put('/staff/products/{product}', [StaffProductController::class, 'update'])->name('staff.products.update');
    Route::delete('/staff/products/{product}', [StaffProductController::class, 'destroy'])->name('staff.products.destroy');

    // Brand Management Routes
    Route::get('/staff/brands', [StaffBrandController::class, 'index'])->name('staff.brands.index');
    Route::get('/staff/brands/create', [StaffBrandController::class, 'create'])->name('staff.brands.create');
    Route::post('/staff/brands', [StaffBrandController::class, 'store'])->name('staff.brands.store');
    Route::get('/staff/brands/{brand}', [StaffBrandController::class, 'show'])->name('staff.brands.show');
    Route::get('/staff/brands/{brand}/edit', [StaffBrandController::class, 'edit'])->name('staff.brands.edit');
    Route::put('/staff/brands/{brand}', [StaffBrandController::class, 'update'])->name('staff.brands.update');

    // Category Management Routes
    Route::get('/staff/categories', [StaffCategoryController::class, 'index'])->name('staff.categories.index');
    Route::get('/staff/categories/create', [StaffCategoryController::class, 'create'])->name('staff.categories.create');
    Route::post('/staff/categories', [StaffCategoryController::class, 'store'])->name('staff.categories.store');
    Route::get('/staff/categories/{category}', [StaffCategoryController::class, 'show'])->name('staff.categories.show');
    Route::get('/staff/categories/{category}/edit', [StaffCategoryController::class, 'edit'])->name('staff.categories.edit');
    Route::put('/staff/categories/{category}', [StaffCategoryController::class, 'update'])->name('staff.categories.update');

    // Supplier Management Routes
    Route::get('/staff/suppliers', [StaffSupplierController::class, 'index'])->name('staff.suppliers.index');
    Route::get('/staff/suppliers/create', [StaffSupplierController::class, 'create'])->name('staff.suppliers.create');
    Route::post('/staff/suppliers', [StaffSupplierController::class, 'store'])->name('staff.suppliers.store');
    Route::get('/staff/suppliers/{supplier}', [StaffSupplierController::class, 'show'])->name('staff.suppliers.show');
    Route::get('/staff/suppliers/{supplier}/edit', [StaffSupplierController::class, 'edit'])->name('staff.suppliers.edit');
    Route::put('/staff/suppliers/{supplier}', [StaffSupplierController::class, 'update'])->name('staff.suppliers.update');

    // sale Management Routes
    Route::get('/staff/sales', [StaffSalesController::class, 'index'])->name('staff.sales.index');
    Route::get('/staff/sales/create', [StaffSalesController::class, 'create'])->name('staff.sales.create');
    Route::post('/staff/sales', [StaffSalesController::class, 'store'])->name('staff.sales.store');
    Route::get('/staff/sales/{sale}', [StaffSalesController::class, 'show'])->name('staff.sales.show');
    Route::get('/staff/sales/{sale}/edit', [StaffSalesController::class, 'edit'])->name('staff.sales.edit');
    Route::put('/staff/sales/{sale}', [StaffSalesController::class, 'update'])->name('staff.sales.update');

    // User Management Routes
    Route::get('/staff/users', [StaffUserController::class, 'index'])->name('staff.users.index');
    Route::get('/staff/users/create', [StaffUserController::class, 'create'])->name('staff.users.create');
    Route::post('/staff/users', [StaffUserController::class, 'store'])->name('staff.users.store');
    Route::get('/staff/users/{user}', [StaffUserController::class, 'show'])->name('staff.users.show');
    Route::get('/staff/users/{user}/edit', [StaffUserController::class, 'edit'])->name('staff.users.edit');
    Route::put('/staff/users/{user}', [StaffUserController::class, 'update'])->name('staff.users.update');
    Route::delete('/staff/users/{user}', [StaffUserController::class, 'destroy'])->name('staff.users.destroy');

    // Account Management Routes
    Route::get('/staff/account', [StaffAccountSettingsController::class, 'edit'])->name('staff.account.edit');
    Route::put('/staff/account', [StaffAccountSettingsController::class, 'update'])->name('staff.account.update');

    // Staff Reports
    Route::get('/staff/reports/products',  [StaffReportController::class, 'products'])->name('staff.reports.products');
    Route::get('/staff/reports/brands',    [StaffReportController::class, 'brands'])->name('staff.reports.brands');
    Route::get('/staff/reports/suppliers', [StaffReportController::class, 'suppliers'])->name('staff.reports.suppliers');
    Route::get('/staff/reports/sales',     [StaffReportController::class, 'sales'])->name('staff.reports.sales');
    Route::get('/staff/reports/users',     [StaffReportController::class, 'users'])->name('staff.reports.users');
});
