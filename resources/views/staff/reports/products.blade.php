<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Online Inventory Management System</title>
        <link rel="icon" href="{{ asset('lmpa.png') }}" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            html {
                font-family: 'Arial', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-50">
        <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
            <table class="w-full">
                <tr>
                    <td class="w-full sm:w-1/2">
                        <h2
                            class="text-xl font-semibold text-gray-800 sm:text-2xl"
                        >
                            Product Inventory Report
                        </h2>
                        <p class="text-sm text-gray-600 sm:text-base">
                            Date:
                            {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <div
            class="mx-auto flex max-w-7xl items-center justify-between px-4 py-5 sm:px-6 lg:px-8"
        >
            <div>
                <div class="text-xl font-semibold text-gray-800 sm:text-2xl">
                    Lister Motor Parts & Accessories
                </div>
                <div class="text-sm text-gray-600 sm:text-base">
                    Central Nautical Hwy, Danao City, Cebu
                </div>
            </div>

            <div>
                <form
                    method="GET"
                    action="{{ route('staff.reports.products') }}"
                >
                    <button
                        type="submit"
                        name="download"
                        value="pdf"
                        class="rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white shadow-md transition duration-200 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                    >
                        Download Report
                    </button>
                </form>
            </div>
        </div>

        <div
            class="mx-auto max-w-7xl overflow-x-auto px-4 py-5 sm:px-6 lg:px-8"
        >
            <table
                class="w-full border-collapse text-sm text-gray-700 sm:text-base"
            >
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-3 text-left">SKU</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Stock</th>
                        <th class="p-3 text-left">Category</th>
                        <th class="p-3 text-left">Brand</th>
                        <th class="p-3 text-left">Price</th>
                        <th class="p-3 text-left">Supplier</th>
                        <th class="p-3 text-left">Total Stock Value</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalStockValue = 0;
                        $totalPrice = 0;
                        $totalStock = 0;
                    @endphp

                    @foreach ($products as $product)
                        @php
                            $productStockValue = $product->price * $product->stock;
                            $totalStockValue += $productStockValue;
                            $totalPrice += $product->price;
                            $totalStock += $product->stock;
                        @endphp

                        <tr class="bg-gray-100 odd:bg-white">
                            <td class="p-3">{{ $product->sku }}</td>
                            <td class="p-3">{{ $product->name }}</td>
                            <td class="p-3">{{ $product->stock }}</td>
                            <td class="p-3">
                                {{ $product->category->name ?? 'None' }}
                            </td>
                            <td class="p-3">
                                {{ $product->brand->name ?? 'None' }}
                            </td>
                            <td class="p-3">
                                {{ number_format($product->price, 2, '.', ',') }}
                            </td>
                            <td class="p-3">
                                {{ $product->supplier->name ?? 'None' }}
                            </td>
                            <td class="p-3">
                                {{ number_format($productStockValue, 2, '.', ',') }}
                            </td>
                        </tr>
                    @endforeach

                    <tr class="bg-gray-200">
                        <td colspan="7" class="p-3 text-right font-semibold">
                            Total Price
                        </td>
                        <td class="p-3 font-semibold">
                            Php {{ number_format($totalPrice, 2, '.', ',') }}
                        </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td colspan="7" class="p-3 text-right font-semibold">
                            Total Stock
                        </td>
                        <td class="p-3 font-semibold">{{ $totalStock }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td colspan="7" class="p-3 text-right font-semibold">
                            Total Stock Value
                        </td>
                        <td class="p-3 font-semibold">
                            Php
                            {{ number_format($totalStockValue, 2, '.', ',') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div
            class="mx-auto max-w-7xl p-5 text-center text-sm text-gray-700 sm:text-base"
        >
            <div>Thank you for choosing Lister Motor Parts & Accessories</div>
            <div>&copy; {{ now()->year }} lmpa.shop</div>
        </div>
    </body>
</html>
