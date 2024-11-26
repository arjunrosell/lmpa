<?php

namespace App\Http\Controllers\Client;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientReportController extends Controller
{
    public function index()
    {
        return view('client.reports.index');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'report_type' => 'required|in:sales',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $userId = auth()->id();

        $data = match ($validated['report_type']) {
            'sales' => \App\Models\Sale::with(['product', 'user'])
                ->where('user_id', $userId)
                ->whereBetween('created_at', [
                    $validated['start_date'] . ' 00:00:00',
                    $validated['end_date'] . ' 23:59:59'
                ])->orderBy('created_at', 'asc')->get(),

            default => throw new \InvalidArgumentException('Invalid report type'),
        };

        return view('client.reports.generate', [
            'data' => $data,
            'reportType' => ucfirst($validated['report_type']),
            'startDate' => $validated['start_date'],
            'endDate' => $validated['end_date'],
            'sales' => $validated['report_type'] === 'sales' ? $data : null,
        ]);
    }
}
