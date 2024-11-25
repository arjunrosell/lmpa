@include('layouts.client')
<x-page-title>Categories</x-page-title>
@include('layouts.client.sidebar.navigation-menu')
<x-forms.container>
    <div
        class="flex flex-col items-center justify-between space-y-3 pb-4 pt-2 md:flex-row md:space-x-4 md:space-y-0"
    >
        <x-search-form :action="route('client.categories.index')" />
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
                name="category_filter"
                onchange="window.location.href = '?category=' + this.value"
            >
                <option value="">Filter by Category</option>
                @foreach ($allCategories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ request('category') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                        ({{ $category->products_count }})
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
                    <th
                        scope="col"
                        class="hidden max-w-[200px] px-4 py-3 md:table-cell lg:max-w-[400px]"
                    >
                        Description
                    </th>
                    <th scope="col" class="px-4 py-3">Created</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-b hover:bg-gray-100 dark:border-gray-700">
                        <th
                            scope="row"
                            class="whitespace-nowrap px-4 py-3 font-medium text-gray-900 dark:text-white"
                        >
                            {{ $category->name }}
                        </th>
                        <td
                            class="hidden max-w-[200px] truncate px-4 py-3 md:table-cell lg:max-w-[400px]"
                        >
                            {{ $category->description }}
                        </td>
                        <td class="px-4 py-3">
                            {{ $category->created_at ? $category->created_at->format('Y/m/d') : '' }}
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
                            No categories found.
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pt-4 sm:px-0">
        {{ $categories->links() }}
    </div>
</x-forms.container>
