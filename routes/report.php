<?php

use App\Http\Controllers\Admin\AdminReportController;

Route::prefix('admin/reports')
    ->name('admin.reports.')
    ->middleware(['auth', 'role:admin'])  // Add middleware here
    ->group(function () {
        Route::get('/products', [AdminReportController::class, 'products'])->name('products');
        Route::get('/brands', [AdminReportController::class, 'brands'])->name('brands');
        Route::get('/suppliers', [AdminReportController::class, 'suppliers'])->name('suppliers');
        Route::get('/sales', [AdminReportController::class, 'sales'])->name('sales');
        Route::get('/users', [AdminReportController::class, 'users'])->name('users');
    });
