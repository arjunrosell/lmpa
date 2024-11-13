@include('layouts.admin')
<x-page-title>Sales</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 pt-2 md:flex-row md:space-x-4 md:space-y-0"
    >
        <x-search-form :action="route('admin.sales.index')" />
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
                name="status"
                onchange="window.location.href = '?status=' + this.value"
            >
                <option value="">Filter by Status</option>
                <option
                    value="pending"
                    {{ request('status') == 'pending' ? 'selected' : '' }}
                >
                    Pending
                </option>
                <option
                    value="processing"
                    {{ request('status') == 'processing' ? 'selected' : '' }}
                >
                    Processing
                </option>
                <option
                    value="completed"
                    {{ request('status') == 'completed' ? 'selected' : '' }}
                >
                    Completed
                </option>
                <option
                    value="cancelled"
                    {{ request('status') == 'cancelled' ? 'selected' : '' }}
                >
                    Cancelled
                </option>
            </select>
            <x-button href="{{ route('admin.sales.create') }}">
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
                Add New Sales
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
                        ID
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Product Name
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-2 py-3 lg:max-w-[400px]"
                    >
                        Customer Name
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Date
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Quantity
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Product Price
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Amount
                    </th>
                    <th
                        scope="col"
                        class="max-w-[200px] px-4 py-3 lg:max-w-[400px]"
                    >
                        Status
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
                @forelse ($sales as $sale)
                    <tr class="border-b dark:border-gray-700">
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            {{ $sale->id }}
                        </td>
                        <th
                            scope="row"
                            class="max-w-[200px] truncate whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white lg:max-w-[400px]"
                        >
                            {{ $sale->product ? $sale->product->name : 'No Product Found' }}
                        </th>
                        <th
                            scope="row"
                            class="max-w-[200px] truncate whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white lg:max-w-[400px]"
                        >
                            {{ $sale->user ? $sale->user->name : 'No Customer' }}
                        </th>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 md:table-cell lg:max-w-[400px]"
                        >
                            {{ $sale->sale_date }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 md:table-cell lg:max-w-[400px]"
                        >
                            {{ $sale->quantity }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 md:table-cell lg:max-w-[400px]"
                        >
                            {{ $sale->product && $sale->product->price !== null ? '₱' . number_format($sale->product->price, 2, '.', ',') : 'N/A' }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            ₱{{ number_format($sale->total_amount, 2, '.', ',') }}
                        </td>
                        <td
                            class="max-w-[200px] truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            @if ($sale->status == 'pending')
                                <span
                                    class="rounded-full bg-orange-100 px-2 py-1 text-xs font-semibold leading-tight text-orange-700 dark:bg-orange-600 dark:text-white"
                                >
                                    {{ ucfirst($sale->status) }}
                                </span>
                            @elseif ($sale->status == 'processing')
                                <span
                                    class="rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold leading-tight text-blue-700 dark:bg-blue-700 dark:text-green-100"
                                >
                                    {{ ucfirst($sale->status) }}
                                </span>
                            @elseif ($sale->status == 'completed')
                                <span
                                    class="rounded-full bg-green-100 px-2 py-1 text-xs font-semibold leading-tight text-green-700 dark:bg-green-700 dark:text-green-100"
                                >
                                    {{ ucfirst($sale->status) }}
                                </span>
                            @elseif ($sale->status == 'cancelled')
                                <span
                                    class="rounded-full bg-red-100 px-2 py-1 text-xs font-semibold leading-tight text-red-700 dark:bg-red-700 dark:text-red-100"
                                >
                                    {{ ucfirst($sale->status) }}
                                </span>
                            @else
                                <span
                                    class="rounded-full bg-gray-100 px-2 py-1 text-xs font-semibold leading-tight text-gray-700 dark:bg-gray-700 dark:text-gray-100"
                                >
                                    {{ ucfirst($sale->status ?? 'None') }}
                                </span>
                            @endif
                        </td>
                        <td
                            class="flex max-w-[200px] items-center justify-end truncate px-4 py-3 lg:max-w-[400px]"
                        >
                            <button
                                id="sale-{{ $sale->id }}-dropdown-button"
                                data-dropdown-toggle="sale-{{ $sale->id }}-dropdown"
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
                                id="sale-{{ $sale->id }}-dropdown"
                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                            >
                                <ul
                                    class="text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="sale-{{ $sale->id }}-dropdown-button"
                                >
                                    <li>
                                        <a
                                            href="{{ route('admin.sales.show', $sale->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Show
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('admin.sales.edit', $sale->id) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                        >
                                            Edit
                                        </a>
                                    </li>
                                </ul>
                                <form
                                    action="{{ route('admin.sales.destroy', $sale->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                                    >
                                        Delete
                                    </button>
                                </form>
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
                            No sales found.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- pagination --}}
    <div class="pt-4 sm:px-0">
        {{ $sales->links() }}
    </div>
</x-forms.container>
