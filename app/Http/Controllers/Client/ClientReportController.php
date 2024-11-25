<?php

namespace App\Http\Controllers\Client;

use App\Models\Sale;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class ClientReportController extends Controller
{
    public function sales(Request $request)
    {
        $sales = Sale::with('product')
            ->where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        if ($request->query('download') === 'pdf') {
            $filename = "Sales_Report_" . now()->format('F_j_Y_H_i_s') . ".pdf";
            $pdf = Pdf::loadView('client.reports.sales', compact('sales'));
            return $pdf->download($filename);
        }

        return view('client.reports.sales', compact('sales'));
    }
}
