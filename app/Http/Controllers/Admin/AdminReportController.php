<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index');
    }
    public function generate(Request $request)
    {
        $validated = $request->validate([
            'report_type' => 'required|in:products,sales,suppliers,brands,categories,users',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $data = match ($validated['report_type']) {
            'products' => \App\Models\Product::whereBetween('created_at', [$validated['start_date'], $validated['end_date']])->get(),
            'sales' => \App\Models\Sale::with(['product'])
                ->whereBetween('created_at', [$validated['start_date'], $validated['end_date']])
                ->get(),
            'suppliers' => \App\Models\Supplier::whereBetween('created_at', [$validated['start_date'], $validated['end_date']])->get(),
            'brands' => \App\Models\Brand::whereBetween('created_at', [$validated['start_date'], $validated['end_date']])->get(),
            'categories' => \App\Models\Category::whereBetween('created_at', [$validated['start_date'], $validated['end_date']])->get(),
            'users' => \App\Models\User::with('roles')
                ->whereBetween('created_at', [$validated['start_date'], $validated['end_date']])
                ->orderBy('created_at', 'asc')
                ->get(),
            default => throw new \InvalidArgumentException('Invalid report type'),
        };

        return view('admin.reports.generate', [
            'data' => $data,
            'reportType' => ucfirst($validated['report_type']),
            'startDate' => $validated['start_date'],
            'endDate' => $validated['end_date'],
            'products' => $validated['report_type'] === 'products' ? $data : null,
            'sales' => $validated['report_type'] === 'sales' ? $data : null,
            'suppliers' => $validated['report_type'] === 'suppliers' ? $data : null,
            'brands' => $validated['report_type'] === 'brands' ? $data : null,
            'categories' => $validated['report_type'] === 'categories' ? $data : null,
            'users' => $validated['report_type'] === 'users' ? $data : null,
        ]);
    }
}
