@include('layouts.staff')
<x-page-title>Products</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 pt-2 md:flex-row md:space-x-4 md:space-y-0"
    >
        <x-search-form :action="route('staff.products.index')" />
        <div
            class="flex w-full flex-shrink-0 flex-col items-stretch justify-end space-y-2 md:w-auto md:flex-row md:items-center md:space-x-3 md:space-y-0"
        >
            <select
                class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                name="sort_by"
                onchange="window.location.href = '?sort=' + this.value"
            >
                <option value="">Sort By</option>
                <option
                    value="name_asc"
                    {{ request('sort') == 'name_asc' ? 'selected' : '' }}
                >
                    Name (A-Z)
                </option>
                <option
                    value="name_desc"
                    {{ request('sort') == 'name_desc' ? 'selected' : '' }}
                >
                    Name (Z-A)
                </option>
                <option
                    value="price_asc"
                    {{ request('sort') == 'price_asc' ? 'selected' : '' }}
                >
                    Price (Low to High)
                </option>
                <option
                    value="price_desc"
                    {{ request('sort') == 'price_desc' ? 'selected' : '' }}
                >
                    Price (High to Low)
                </option>
                <option
                    value="created_asc"
                    {{ request('sort') == 'created_asc' ? 'selected' : '' }}
                >
                    Date Created (Oldest First)
                </option>
                <option
                    value="created_desc"
                    {{ request('sort') == 'created_desc' ? 'selected' : '' }}
                >
                    Date Created (Newest First)
                </option>
            </select>

            <select
                class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 rounded-lg border border-gray-300 bg-gray-50 p-2 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                name="brand"
                onchange="window.location.href = '?brand=' + this.value"
            >
                <option value="all">Filter by Brand</option>

                @foreach ($brands as $brand)
                    <option
                        value="{{ $brand->id }}"
                        {{ request('brand') == $brand->id ? 'selected' : '' }}
                    >
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            <x-button href="{{ route('staff.products.create') }}">
                <svg
                    class="mr-1 h-3.5 w-3.5"
                    fill="currentColor"
                    viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        clip-rule="evenodd"
                        fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    />
                </svg>
                Add Product
            </x-button>
        </div>
    </div>
    <div class="h-full overflow-x-auto">
        <table
            class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
        >
            <thead
                class="bg-gray-50 text-sm uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
            >
                <tr>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        SKU
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Image
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Name
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Stock
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Category
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Brand
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Price
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Supplier
                    </th>

                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 text-right lg:max-w-[400px]"
                    >
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b dark:border-gray-700">
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            {{ $product->sku }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            <x-product-image :product="$product" />
                        </td>
                        <th
                            scope="row"
                            class="max-w-[200px] truncate whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white lg:max-w-[400px]"
                        >
                            {{ $product->name }}
                        </th>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 md:table-cell lg:max-w-[400px]"
                        >
                            {{ $product->stock }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            {{ $product->category->name ?? 'None' }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            {{ $product->brand->name ?? 'None' }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            ₱{{ number_format($product->price, 2, '.', ',') }}
                        </td>
                        <td
                            class="max-w-[150px] truncate px-4 py-3 lg:max-w-[200px]"
                        >
                            {{ $product->supplier->name ?? 'None' }}
                        </td>
                        <td
                            class="flex max-w-[200px] items-center justify-end truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            <button
                                id="product-{{ $product->id }}-dropdown-button"
                                data-dropdown-toggle="product-{{ $product->id }}-dropdown"
                                class="inline-flex items-center rounded-lg p-0.5 text-center text-sm font-medium text-gray-500 hover:text-gray-800 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                type="button"
                            >
                                <svg
                                    class="h-5 w-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
                                    />
                                </svg>
                            </button>
                            <div
                                id="product-{{ $product->id }}-dropdown"
                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                            >
                                <ul
                                    class="text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="product-{{ $product->id }}-dropdown-button"
                                >
                                    <li>
                                        <a
                                            href="{{ route('staff.products.show', $product->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Show
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('staff.products.edit', $product->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
    <!-- Pagination links -->
    {{ $products->links() }}
</x-forms.container>
