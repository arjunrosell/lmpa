<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Orders Report</title>
        <link rel="icon" href="{{ asset('lmpa.png') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            html {
                font-family: 'Arial', sans-serif;
            }
            @media print {
                button {
                    display: none;
                }
                body {
                    font-size: 10px;
                }
                table {
                    font-size: 10px;
                    border-collapse: collapse;
                    width: 100%;
                }
                th,
                td {
                    padding: 3px;
                    border: 1px solid #ccc;
                }
                tr {
                    border: 1px solid #ccc;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex min-h-screen flex-col">
            <div class="container mx-auto mt-10 p-5">
                <div class="mb-5">
                    <h1 class="text-xl font-bold">
                        Lister Motor Parts & Accessories
                    </h1>
                    <p class="text-sm">
                        Central Nautical Hwy, Danao City, Cebu
                    </p>
                </div>
                <h2 class="text-lg font-bold">Orders Report</h2>
                <p class="mb-2 text-sm">
                    Report from
                    {{ \Carbon\Carbon::parse($startDate)->format('F j, Y') }}
                    to {{ \Carbon\Carbon::parse($endDate)->format('F j, Y') }}
                </p>

                @if ($reportType === 'Sales')
                    @if ($sales->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">Order ID</th>
                                    <th class="p-3 text-left">Customer Name</th>
                                    <th class="p-3 text-left">Product Name</th>
                                    <th class="p-3 text-left">Quantity</th>
                                    <th class="p-3 text-left">Price</th>
                                    <th class="p-3 text-left">Total Amount</th>
                                    <th class="p-3 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSalesAmount = 0;
                                    $saleCounter = 1;
                                @endphp

                                @foreach ($sales as $sale)
                                    @php
                                        $totalSalesAmount += $sale->total_amount;
                                    @endphp

                                    <tr class="bg-gray-100 odd:bg-white">
                                        <td class="p-3">
                                            {{ $saleCounter++ }}
                                        </td>
                                        <td class="p-3">{{ $sale->id }}</td>
                                        <td class="p-3">
                                            {{ optional($sale->user)->name ?? 'Unknown Customer' }}
                                        </td>
                                        <td class="p-3">
                                            {{ optional($sale->product)->name ?? 'No Product Found' }}
                                        </td>
                                        <td class="p-3">
                                            {{ $sale->quantity }}
                                        </td>
                                        <td class="p-3">
                                            {{ $sale->product ? '₱' . number_format($sale->product->price, 2, '.', ',') : 'N/A' }}
                                        </td>
                                        <td class="p-3">
                                            {{ number_format($sale->total_amount, 2, '.', ',') }}
                                        </td>
                                        <td class="p-3">
                                            {{ ucfirst($sale->status) }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="bg-gray-200">
                                    <td
                                        colspan="6"
                                        class="p-3 text-right font-semibold"
                                    >
                                        Total Sales Amount
                                    </td>
                                    <td class="p-3 font-semibold">
                                        ₱{{ number_format($totalSalesAmount, 2, '.', ',') }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-red-500">No orders found.</p>
                    @endif
                @endif

                <div class="mt-5 space-x-2">
                    <button
                        onclick="window.location.href='{{ url()->previous() }}'"
                        class="rounded-md bg-blue-600 px-4 py-2 text-white shadow hover:bg-blue-700"
                    >
                        Back
                    </button>
                    <button
                        onclick="window.print()"
                        class="rounded-md bg-blue-600 px-4 py-2 text-white shadow hover:bg-blue-700"
                    >
                        Print Report
                    </button>
                </div>
            </div>
        </div>
    </body>
</html>
