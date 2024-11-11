<?php

use App\Http\Controllers\Admin\AdminReportController;

//Admin Reports
Route::prefix('admin/reports')
    ->name('admin.reports.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/products', [AdminReportController::class, 'products'])->name('products');
        Route::get('/brands', [AdminReportController::class, 'brands'])->name('brands');
        Route::get('/suppliers', [AdminReportController::class, 'suppliers'])->name('suppliers');
        Route::get('/sales', [AdminReportController::class, 'sales'])->name('sales');
        Route::get('/users', [AdminReportController::class, 'users'])->name('users');
    });

//Staff Reports
Route::prefix('staff/reports')
    ->name('staff.reports.')
    ->middleware(['auth', 'role:staff'])
    ->group(function () {
        Route::get('/products', [AdminReportController::class, 'products'])->name('products');
        Route::get('/brands', [AdminReportController::class, 'brands'])->name('brands');
        Route::get('/suppliers', [AdminReportController::class, 'suppliers'])->name('suppliers');
        Route::get('/sales', [AdminReportController::class, 'sales'])->name('sales');
        Route::get('/users', [AdminReportController::class, 'users'])->name('users');
    });
