@include('layouts.staff')
<x-page-title>Brands</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 pt-2 md:flex-row md:space-x-4 md:space-y-0"
    >
        <x-search-form :action="route('staff.brands.index')" />
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
                name="brand_filter"
                onchange="window.location.href = '?brand=' + this.value"
            >
                <option value="">Filter by Brand</option>
                @foreach ($allBrands as $brand)
                    <option
                        value="{{ $brand->id }}"
                        {{ request('brand') == $brand->id ? 'selected' : '' }}
                    >
                        {{ $brand->name }} ({{ $brand->products_count }})
                    </option>
                @endforeach
            </select>
            <x-button href="{{ route('staff.brands.create') }}">
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
                Add Brand
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
                    <th scope="col" class="px-4 py-3">Image</th>
                    <th scope="col" class="px-4 py-3">Name</th>
                    <th
                        scope="col"
                        class="hidden max-w-[150px] px-4 py-3 md:table-cell lg:max-w-[200px]"
                    >
                        Description
                    </th>
                    <th scope="col" class="px-4 py-3">Created</th>
                    <th scope="col" class="px-4 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr class="border-b dark:border-gray-700">
                        <td class="px-4 py-3">
                            <x-brand-logo :brand="$brand" />
                        </td>
                        <th
                            scope="row"
                            class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
                        >
                            {{ $brand->name }}
                        </th>
                        <td
                            class="hidden max-w-[200px] truncate px-4 py-3 md:table-cell lg:max-w-[300px]"
                        >
                            {{ $brand->description }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $brand->created_at ? $brand->created_at->format('Y/m/d') : '' }}
                        </td>
                        <td class="flex items-center justify-end px-4 py-3">
                            <button
                                id="brand-{{ $brand->id }}-dropdown-button"
                                data-dropdown-toggle="brand-{{ $brand->id }}-dropdown"
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
                                id="brand-{{ $brand->id }}-dropdown"
                                class="z-10 hidden w-44 divide-y divide-gray-100 rounded bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                            >
                                <ul
                                    class="text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="brand-{{ $brand->id }}-dropdown-button"
                                >
                                    <li>
                                        <a
                                            href="{{ route('staff.brands.edit', $brand->id) }}"
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
                            No brands found.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- pagination --}}
    <div class="pt-4 sm:px-0">
        {{ $brands->links() }}
    </div>
</x-forms.container>
