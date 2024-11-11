<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Brand Report</title>
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
            <h2 class="text-xl font-semibold text-gray-800 sm:text-2xl">
                Brand Report
            </h2>
            <p class="text-sm text-gray-600 sm:text-base">
                Date: {{ \Carbon\Carbon::now()->format('l, F j, Y g:i A') }}
            </p>
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
                    action="{{ route('staff.reports.brands') }}"
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
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Brand Name</th>
                        <th class="p-3 text-left">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($brands as $index => $brand)
                        <tr class="bg-gray-100 odd:bg-white">
                            <td class="p-3">{{ $index + 1 }}</td>
                            <td class="p-3">{{ $brand->name }}</td>
                            <td class="p-3">
                                {{ $brand->description ?? 'N/A' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="3"
                                class="p-3 text-center text-gray-500"
                            >
                                No brands found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div
            class="mx-auto max-w-7xl p-5 text-center text-sm text-gray-700 sm:text-base"
        >
            <div>Thank you for viewing the Brand Report</div>
            <div>&copy; {{ now()->year }} lmpa.shop</div>
        </div>
    </body>
</html>
