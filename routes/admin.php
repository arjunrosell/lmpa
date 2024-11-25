<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminSupplierController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAccountSettingsController;

Route::middleware(['auth', 'verified', 'role:admin', 'throttle:global'])->group(function () {

    // Admin Dashboard Route
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index');

    // Product Management Routes
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}', [AdminProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Brand Management Routes
    Route::get('/admin/brands', [AdminBrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/admin/brands/create', [AdminBrandController::class, 'create'])->name('admin.brands.create');
    Route::post('/admin/brands', [AdminBrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/admin/brands/{brand}', [AdminBrandController::class, 'show'])->name('admin.brands.show');
    Route::get('/admin/brands/{brand}/edit', [AdminBrandController::class, 'edit'])->name('admin.brands.edit');
    Route::put('/admin/brands/{brand}', [AdminBrandController::class, 'update'])->name('admin.brands.update');
    Route::delete('/admin/brands/{brand}', [AdminBrandController::class, 'destroy'])->name('admin.brands.destroy');

    // Category Management Routes
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{category}', [AdminCategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/admin/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Supplier Management Routes
    Route::get('/admin/suppliers', [AdminSupplierController::class, 'index'])->name('admin.suppliers.index');
    Route::get('/admin/suppliers/create', [AdminSupplierController::class, 'create'])->name('admin.suppliers.create');
    Route::post('/admin/suppliers', [AdminSupplierController::class, 'store'])->name('admin.suppliers.store');
    Route::get('/admin/suppliers/{supplier}', [AdminSupplierController::class, 'show'])->name('admin.suppliers.show');
    Route::get('/admin/suppliers/{supplier}/edit', [AdminSupplierController::class, 'edit'])->name('admin.suppliers.edit');
    Route::put('/admin/suppliers/{supplier}', [AdminSupplierController::class, 'update'])->name('admin.suppliers.update');
    Route::delete('/admin/suppliers/{supplier}', [AdminSupplierController::class, 'destroy'])->name('admin.suppliers.destroy');

    // Order Management Routes
    Route::get('/admin/sales', [AdminSalesController::class, 'index'])->name('admin.sales.index');
    Route::get('/admin/sales/create', [AdminSalesController::class, 'create'])->name('admin.sales.create');
    Route::post('/admin/sales', [AdminSalesController::class, 'store'])->name('admin.sales.store');
    Route::get('/admin/sales/{sale}', [AdminSalesController::class, 'show'])->name('admin.sales.show');
    Route::get('/admin/sales/{sale}/edit', [AdminSalesController::class, 'edit'])->name('admin.sales.edit');
    Route::put('/admin/sales/{sale}', [AdminSalesController::class, 'update'])->name('admin.sales.update');
    Route::delete('/admin/sales/{sale}', [AdminSalesController::class, 'destroy'])->name('admin.sales.destroy');

    // User Management Routes
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    // Account Management Routes
    Route::get('/admin/account', [AdminAccountSettingsController::class, 'edit'])->name('admin.account.edit');
    Route::put('/admin/account', [AdminAccountSettingsController::class, 'update'])->name('admin.account.update');

    // Admin Reports
    Route::get('/admin/reports/products',  [AdminReportController::class, 'products'])->name('admin.reports.products');
    Route::get('/admin/reports/brands',    [AdminReportController::class, 'brands'])->name('admin.reports.brands');
    Route::get('/admin/reports/suppliers', [AdminReportController::class, 'suppliers'])->name('admin.reports.suppliers');
    Route::get('/admin/reports/sales',     [AdminReportController::class, 'sales'])->name('admin.reports.sales');
    Route::get('/admin/reports/users',     [AdminReportController::class, 'users'])->name('admin.reports.users');
});
