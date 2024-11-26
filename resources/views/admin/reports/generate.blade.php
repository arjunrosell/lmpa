<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $reportType }} Report</title>
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
                <h2 class="text-lg font-bold">{{ $reportType }} Report</h2>
                <p class="mb-2 text-sm">
                    Report from
                    {{ \Carbon\Carbon::parse($startDate)->format('F j, Y') }}
                    to {{ \Carbon\Carbon::parse($endDate)->format('F j, Y') }}
                </p>
                @if ($reportType === 'Products')
                    @if ($products->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">SKU</th>
                                    <th class="p-3 text-left">Name</th>
                                    <th class="p-3 text-left">Stock</th>
                                    <th class="p-3 text-left">Price</th>
                                    <th class="p-3 text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalStockValue = 0;
                                    $totalPrice = 0;
                                    $totalStock = 0;
                                @endphp

                                @foreach ($products as $index => $product)
                                    @php
                                        $productStockValue = $product->price * $product->stock;
                                        $totalStockValue += $productStockValue;
                                        $totalPrice += $product->price;
                                        $totalStock += $product->stock;
                                    @endphp

                                    <tr class="bg-gray-100 odd:bg-white">
                                        <td class="p-3">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="p-3">
                                            {{ $product->sku }}
                                        </td>
                                        <td class="p-3">
                                            {{ $product->name }}
                                        </td>
                                        <td class="p-3">
                                            {{ $product->stock }}
                                        </td>
                                        <td class="p-3">
                                            ₱{{ number_format($product->price, 2, '.', ',') }}
                                        </td>
                                        <td class="p-3">
                                            ₱{{ number_format($productStockValue, 2, '.', ',') }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="bg-gray-100">
                                    <td
                                        colspan="5"
                                        class="p-3 text-right font-semibold"
                                    >
                                        Total Stock:
                                    </td>
                                    <td class="p-3 font-semibold">
                                        {{ $totalStock }}
                                    </td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <td
                                        colspan="5"
                                        class="p-3 text-right font-semibold"
                                    >
                                        Total Price:
                                    </td>
                                    <td class="p-3 font-semibold">
                                        ₱{{ number_format($totalPrice, 2, '.', ',') }}
                                    </td>
                                </tr>

                                <tr class="bg-gray-100">
                                    <td
                                        colspan="5"
                                        class="p-3 text-right font-semibold"
                                    >
                                        Total Stock Value:
                                    </td>
                                    <td class="p-3 font-semibold">
                                        ₱{{ number_format($totalStockValue, 2, '.', ',') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-red-500">
                            No products available.
                        </p>
                    @endif
                @elseif ($reportType === 'Sales')
                    @if ($sales->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">Sale ID</th>
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
                                    @if ($sale->status === 'completed')
                                        @php
                                            $totalSalesAmount += $sale->total_amount;
                                        @endphp

                                        <tr class="bg-gray-100 odd:bg-white">
                                            <td class="p-3">
                                                {{ $saleCounter++ }}
                                            </td>
                                            <td class="p-3">
                                                {{ $sale->id }}
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
                                    @endif
                                @endforeach

                                <tr class="bg-gray-200">
                                    <td
                                        colspan="5"
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
                        <p class="text-center text-red-500">No sales found.</p>
                    @endif
                @elseif ($reportType === 'Suppliers')
                    @if ($suppliers->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">Supplier Name</th>
                                    <th class="p-3 text-left">Email</th>
                                    <th class="p-3 text-left">Phone</th>
                                    <th class="p-3 text-left">Address</th>
                                    <th class="p-3 text-left">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $supplierCounter = 1;
                                @endphp

                                @foreach ($suppliers as $supplier)
                                    <tr class="bg-gray-100 odd:bg-white">
                                        <td class="p-3">
                                            {{ $supplierCounter++ }}
                                        </td>
                                        <td class="p-3">
                                            {{ $supplier->name }}
                                        </td>
                                        <td class="p-3">
                                            {{ $supplier->email }}
                                        </td>
                                        <td class="p-3">
                                            {{ $supplier->phone }}
                                        </td>
                                        <td class="p-3">
                                            {{ $supplier->address }}
                                        </td>
                                        <td class="p-3">
                                            {{ $supplier->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-red-500">
                            No suppliers found.
                        </p>
                    @endif
                @elseif ($reportType === 'Categories')
                    @if ($categories->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">Name</th>
                                    <th class="p-3 text-left">Description</th>
                                    <th class="p-3 text-left">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $categoryCounter = 1;
                                @endphp

                                @foreach ($categories as $category)
                                    <tr class="bg-gray-100 odd:bg-white">
                                        <td class="p-3">
                                            {{ $categoryCounter++ }}
                                        </td>
                                        <td class="p-3">
                                            {{ $category->name }}
                                        </td>
                                        <td class="p-3">
                                            {{ $category->description }}
                                        </td>
                                        <td class="p-3">
                                            {{ $category->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-red-500">
                            No categories found.
                        </p>
                    @endif
                @elseif ($reportType === 'Brands')
                    @if ($brands->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">Name</th>
                                    <th class="p-3 text-left">Description</th>
                                    <th class="p-3 text-left">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $brandCounter = 1;
                                @endphp

                                @foreach ($brands as $brand)
                                    <tr class="bg-gray-100 odd:bg-white">
                                        <td class="p-3">
                                            {{ $brandCounter++ }}
                                        </td>
                                        <td class="p-3">{{ $brand->name }}</td>
                                        <td class="p-3">
                                            {{ $brand->description }}
                                        </td>
                                        <td class="p-3">
                                            {{ $brand->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-red-500">No brands found.</p>
                    @endif
                @elseif ($reportType === 'Users')
                    @if ($users->isNotEmpty())
                        <table
                            class="min-w-full table-auto border-collapse border border-gray-200"
                        >
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="p-3 text-left">No.</th>
                                    <th class="p-3 text-left">Name</th>
                                    <th class="p-3 text-left">Email</th>
                                    <th class="p-3 text-left">Roles</th>
                                    <th class="p-3 text-left">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $userCounter = 1;
                                @endphp

                                @foreach ($users as $user)
                                    <tr class="bg-gray-100 odd:bg-white">
                                        <td class="p-3">
                                            {{ $userCounter++ }}
                                        </td>
                                        <td class="p-3">{{ $user->name }}</td>
                                        <td class="p-3">{{ $user->email }}</td>
                                        <td class="p-3">
                                            @forelse ($user->roles as $role)
                                                <span class="text-capitalize">
                                                    {{ ucwords($role->name) }}
                                                </span>
                                            @empty
                                                <span>No Assigned Roles</span>
                                            @endforelse
                                        </td>
                                        <td class="p-3">
                                            {{ $user->created_at->format('F j, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-red-500">
                            No users found with the 'client' role.
                        </p>
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
