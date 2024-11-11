<?php

use App\Http\Controllers\Admin\AdminReportController;

//Admin Reports
// Staff Reports
Route::get('/staff/reports/products',  [AdminReportController::class, 'products'])->name('staff.reports.products');
Route::get('/staff/reports/brands',    [AdminReportController::class, 'brands'])->name('staff.reports.brands');
Route::get('/staff/reports/suppliers', [AdminReportController::class, 'suppliers'])->name('staff.reports.suppliers');
Route::get('/staff/reports/sales',     [AdminReportController::class, 'sales'])->name('staff.reports.sales');
Route::get('/staff/reports/users',     [AdminReportController::class, 'users'])->name('staff.reports.users');

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
