@include('layouts.admin')
<x-page-title>Admin Dashboard</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <div class="mb-6 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div
            class="shadow-xs flex items-center rounded-lg bg-gray-100 p-8 dark:bg-gray-800"
        >
            <div
                class="mr-4 rounded-full bg-orange-100 p-3 text-orange-500 dark:bg-orange-500 dark:text-orange-100"
            >
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Clients
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $totalClients }}
                </p>
            </div>
        </div>
        <div
            class="shadow-xs flex items-center rounded-lg bg-gray-100 p-8 dark:bg-gray-800"
        >
            <div
                class="mr-4 rounded-full bg-green-100 p-3 text-green-500 dark:bg-green-500 dark:text-green-100"
            >
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Total Sales
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    ₱{{ number_format($totalSales, 2) }}
                </p>
            </div>
        </div>
        <div
            class="shadow-xs flex items-center rounded-lg bg-gray-100 p-8 dark:bg-gray-800"
        >
            <div
                class="mr-4 rounded-full bg-blue-100 p-3 text-blue-500 dark:bg-blue-500 dark:text-blue-100"
            >
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
                    ></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Sales Completed
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $completedSales }}
                </p>
            </div>
        </div>
        <div
            class="shadow-xs flex items-center rounded-lg bg-gray-100 p-8 dark:bg-gray-800"
        >
            <div
                class="mr-4 rounded-full bg-teal-100 p-3 text-teal-500 dark:bg-teal-500 dark:text-teal-100"
            >
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 8H9V5h2v5zm0 4H9v-2h2v2z"
                    />
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Pending
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    {{ $pendingSales }}
                </p>
            </div>
        </div>
    </div>
    <div class="mb-6 grid gap-6 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-2">
        <div class="w-full overflow-hidden rounded-lg border bg-white p-6">
            <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                Monthly User Registrations
            </h2>
            <div class="relative h-64 w-full">
                <canvas id="monthlyDataChart"></canvas>
            </div>
        </div>
        <div class="w-full overflow-hidden rounded-lg border bg-white p-6">
            <h2
                class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
            >
                Sales Status Distribution
            </h2>
            <div class="relative h-64 w-full">
                <canvas id="orderStatusChart"></canvas>
            </div>
        </div>
    </div>
    <div class="mb-6 h-full overflow-x-auto">
        <div class="mb-2 px-4 text-lg font-semibold">Top Selling Products</div>
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="border-y bg-gray-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-4 py-3">SKU</th>
                    <th scope="col" class="px-4 py-3">Image</th>
                    <th scope="col" class="px-4 py-3">Name</th>
                    <th scope="col" class="px-4 py-3">Stock</th>
                    <th scope="col" class="px-4 py-3">Category</th>
                    <th scope="col" class="px-4 py-3">Brand</th>
                    <th scope="col" class="px-4 py-3">Price</th>
                    <th
                        scope="col"
                        class="max-w-[150px] px-4 py-3 lg:max-w-[200px]"
                    >
                        Supplier
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topSellingProducts as $product)
                    <tr class="border-b hover:bg-gray-100 dark:border-gray-700">
                        <td class="px-4 py-3">
                            {{ $product->sku }}
                        </td>
                        <td class="px-4 py-3">
                            <x-product-image :product="$product" />
                        </td>
                        <th
                            scope="row"
                            class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
                        >
                            {{ $product->name }}
                        </th>
                        <td class="px-4 py-3">
                            {{ $product->stock }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $product->category->name ?? 'None' }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $product->brand->name ?? 'None' }}
                        </td>
                        <td class="px-4 py-3">
                            ₱{{ number_format($product->price, 2, '.', ',') }}
                        </td>
                        <td
                            class="max-w-[150px] truncate px-4 py-3 lg:max-w-[200px]"
                        >
                            {{ $product->supplier->name ?? 'None' }}
                        </td>
                    </tr>
                @empty
                    <tr
                        class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
                    >
                        <th
                            scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                        >
                            No products found.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="h-full overflow-x-auto">
        <div class="mb-2 px-4 text-lg font-semibold">Top Suppliers</div>
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="border-y bg-gray-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th scope="col" class="px-4 py-3">Name</th>
                    <th scope="col" class="px-4 py-3">Email</th>
                    <th scope="col" class="px-4 py-3">Phone</th>
                    <th
                        scope="col"
                        class="max-w-[150px] px-4 py-3 lg:max-w-[200px]"
                    >
                        Supplier
                    </th>
                    <th scope="col" class="px-4 py-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($topSuppliers as $supplier)
                    <tr class="border-b hover:bg-gray-100 dark:border-gray-700">
                        <th
                            scope="row"
                            class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
                        >
                            {{ $supplier->name }}
                        </th>
                        <td class="px-4 py-3">{{ $supplier->email }}</td>
                        <td class="px-4 py-3">{{ $supplier->phone }}</td>
                        <td
                            class="max-w-[150px] truncate px-4 py-3 lg:max-w-[200px]"
                        >
                            {{ $supplier->address }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $supplier->created_at ? $supplier->created_at->format('Y/m/d') : '' }}
                        </td>
                    </tr>
                @empty
                    <tr
                        class="border-b bg-white dark:border-gray-700 dark:bg-gray-800"
                    >
                        <th
                            scope="row"
                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                        >
                            No suppliers found.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-forms.container>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var monthlyDataCtx = document
        .getElementById('monthlyDataChart')
        .getContext('2d')
    var monthlyDataChart = new Chart(monthlyDataCtx, {
        type: 'line',
        data: {
            labels: [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December',
            ],
            datasets: [
                {
                    label: 'User Registrations',
                    data: @json(array_values($chartData['users'])),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    borderWidth: 2,
                    tension: 0.4,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    })
    var salesStatusCtx = document
        .getElementById('orderStatusChart')
        .getContext('2d')

    var salesStatusChart = new Chart(salesStatusCtx, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Processing', 'Completed', 'Canceled'],
            datasets: [
                {
                    label: 'Order Status',
                    data: @json(array_values($saleStatusData)),
                    backgroundColor: [
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    })
</script>
