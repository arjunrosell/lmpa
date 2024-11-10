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
            <div class="flex w-full items-center space-x-3 md:w-auto">
                <button
                    id="actionsDropdownButton"
                    data-dropdown-toggle="actionsDropdown"
                    class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                    type="button"
                >
                    <svg
                        class="-ml-1 mr-1.5 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                    Actions
                </button>
                <div
                    id="actionsDropdown"
                    class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                >
                    <ul
                        class="py-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="actionsDropdownButton"
                    >
                        <li>
                            <a
                                href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Mass Edit
                            </a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a
                            href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white"
                        >
                            Delete all
                        </a>
                    </div>
                </div>
                <button
                    id="filterDropdownButton"
                    data-dropdown-toggle="filterDropdown"
                    class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
                    type="button"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                        class="mr-2 h-4 w-4 text-gray-400"
                        viewbox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                            clip-rule="evenodd"
                        />
                    </svg>
                    Filter
                    <svg
                        class="-mr-1 ml-1.5 h-5 w-5"
                        fill="currentColor"
                        viewbox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true"
                    >
                        <path
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                </button>
                <div
                    id="filterDropdown"
                    class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-gray-700"
                >
                    <h6
                        class="mb-3 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Choose Supplier
                    </h6>
                    <ul
                        class="space-y-2 text-sm"
                        aria-labelledby="filterDropdownButton"
                    >
                        <li class="flex items-center">
                            <input
                                id="apple"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="apple"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Apple (56)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="fitbit"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="fitbit"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Microsoft (16)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="razor"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="razor"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Razor (49)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="nikon"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="nikon"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                Nikon (12)
                            </label>
                        </li>
                        <li class="flex items-center">
                            <input
                                id="benq"
                                type="checkbox"
                                value=""
                                class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            />
                            <label
                                for="benq"
                                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                            >
                                BenQ (74)
                            </label>
                        </li>
                    </ul>
                </div>
            </div>
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
