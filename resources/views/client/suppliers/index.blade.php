@include('layouts.client')
<x-page-title>Suppliers</x-page-title>
@include('layouts.client.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 pt-2 md:flex-row md:space-x-4 md:space-y-0"
    >
        <x-search-form :action="route('client.suppliers.index')" />
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
                name="supplier_name"
                onchange="window.location.href = '?supplier_name=' + this.value"
            >
                <option value="">Filter by Supplier</option>
                @foreach ($allSuppliers as $supplier)
                    <option
                        value="{{ $supplier->id }}"
                        {{ request('supplier_name') == $supplier->id ? 'selected' : '' }}
                    >
                        {{ $supplier->name }}
                        ({{ $supplier->products_count }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="h-full overflow-x-auto">
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
                        Address
                    </th>
                    <th scope="col" class="px-4 py-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)
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
    <div class="pt-4 sm:px-0">
        {{ $suppliers->links() }}
    </div>
</x-forms.container>
