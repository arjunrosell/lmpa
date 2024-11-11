<?php

namespace App\Http\Controllers\Staff;

use App\Models\Sale;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class StaffReportController extends Controller
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
            $pdf = Pdf::loadView('staff.reports.products', compact('products', 'currentDate'));

            return $pdf->stream($filename);
        }

        return view('staff.reports.products', compact('products', 'currentDate'));
    }

    public function brands(Request $request)
    {
        $brands = Brand::orderBy('name', 'desc')->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Brands_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('staff.reports.brands', compact('brands'));
            return $pdf->download($filename);
        }

        return view('staff.reports.brands', compact('brands'));
    }

    public function suppliers(Request $request)
    {
        $suppliers = Supplier::all();

        if ($request->query('download') === 'pdf') {
            $filename = "Suppliers_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('staff.reports.suppliers', compact('suppliers'));
            return $pdf->download($filename);
        }

        return view('staff.reports.suppliers', compact('suppliers'));
    }

    public function sales(Request $request)
    {
        $sales = Sale::with('product')->orderBy('created_at', 'desc')->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Sales_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('staff.reports.sales', compact('sales'));
            return $pdf->download($filename);
        }

        return view('staff.reports.sales', compact('sales'));
    }

    public function users(Request $request)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })
            ->orderBy('created_at', 'desc')
            ->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Users_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('staff.reports.users', compact('users'));
            return $pdf->download($filename);
        }

        return view('staff.reports.users', compact('users'));
    }
}
