<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class AdminReportController extends Controller
{
    public function products(Request $request)
    {
        $products = Product::with(['category', 'brand', 'supplier'])
            ->orderBy('created_at', 'desc')
            ->get();

        $currentDate = now()->format('F_j_Y');
        $currentTime = now()->format('H_i_s');

        if ($request->query('download') === 'pdf') {
            $filename = "Product_Report_{$currentDate}_{$currentTime}.pdf";
            $pdf = Pdf::loadView('admin.reports.products', compact('products', 'currentDate'));

            return $pdf->stream($filename);
        }

        return view('admin.reports.products', compact('products', 'currentDate'));
    }

    public function brands(Request $request)
    {
        $brands = Brand::orderBy('name', 'desc')->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Brands_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('admin.reports.brands', compact('brands'));
            return $pdf->download($filename);
        }

        return view('admin.reports.brands', compact('brands'));
    }

    public function suppliers(Request $request)
    {
        $suppliers = Supplier::all();

        if ($request->query('download') === 'pdf') {
            $filename = "Suppliers_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('admin.reports.suppliers', compact('suppliers'));
            return $pdf->download($filename);
        }

        return view('admin.reports.suppliers', compact('suppliers'));
    }

    public function sales(Request $request)
    {
        $sales = Sale::with('product')->orderBy('created_at', 'desc')->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Sales_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('admin.reports.sales', compact('sales'));
            return $pdf->download($filename);
        }

        return view('admin.reports.sales', compact('sales'));
    }

    public function users(Request $request)
    {
        // Fetch users who have the 'client' role
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Users_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('admin.reports.users', compact('users'));
            return $pdf->download($filename);
        }

        return view('admin.reports.users', compact('users'));
    }
}
