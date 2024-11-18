@include('layouts.client')
<x-page-title>Client Dashboard</x-page-title>
@include('layouts.client.sidebar.navigation-menu')
<x-forms.container>
    <div class="mb-6 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->
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
                    Total clients
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    6389
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="shadow-xs rounded-lgbg-gray-100 flex items-center bg-gray-100 p-8 dark:bg-gray-800"
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
                    Account balance
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    $ 1,000,000
                </p>
            </div>
        </div>
        <!-- Card -->
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
                    New sales
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    376
                </p>
            </div>
        </div>
        <!-- Card -->
        <div
            class="shadow-xs flex items-center rounded-lg bg-gray-100 p-8 dark:bg-gray-800"
        >
            <div
                class="mr-4 rounded-full bg-teal-100 p-3 text-teal-500 dark:bg-teal-500 dark:text-teal-100"
            >
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">
                    Pending contacts
                </p>
                <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                >
                    35
                </p>
            </div>
        </div>
    </div>
    <div class="mb-6 h-full overflow-x-auto">
        <div class="mb-2 px-4 text-lg font-semibold">Top Selling Products</div>
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="bg-gray-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
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
                @forelse ($products as $product)
                    <tr class="border-b dark:border-gray-700">
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
    {{-- Supplier --}}
    <div class="h-full overflow-x-auto">
        <div class="mb-2 px-4 text-lg font-semibold">Top Supplier</div>
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="bg-gray-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
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
                @forelse ($suppliers as $supplier)
                    <tr class="border-b dark:border-gray-700">
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
    <div
        class="flex items-center justify-between border-gray-200 bg-white pt-4 sm:px-0"
    >
        <div class="flex flex-1 justify-between sm:hidden">
            <a
                href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Previous
            </a>
            <a
                href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >
                Next
            </a>
        </div>
    </div>
</x-forms.container>
