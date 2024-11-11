<!-- resources/views/components/filter-dropdown.blade.php -->

@props([
    'items' => [],
    'actionUrl' => '#',
    'checkboxName' => 'brands[]',
    'dropdownId' => 'filterDropdown',
    'buttonId' => 'filterDropdownButton',
    'buttonText' => 'Filter',
])

<div class="relative">
    <!-- Button to toggle dropdown -->
    <button
        id="{{ $buttonId }}"
        data-dropdown-toggle="{{ $dropdownId }}"
        class="hover:text-primary-700 flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 md:w-auto"
        type="button"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            aria-hidden="true"
            class="mr-2 h-4 w-4 text-gray-400"
            viewBox="0 0 20 20"
            fill="currentColor"
        >
            <path
                fill-rule="evenodd"
                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                clip-rule="evenodd"
            />
        </svg>
        {{ $buttonText }}
        <svg
            class="-mr-1 ml-1.5 h-5 w-5"
            fill="currentColor"
            viewBox="0 0 20 20"
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

    <!-- Filter Form -->
    <form method="GET" action="{{ $actionUrl }}">
        <div
            id="{{ $dropdownId }}"
            class="z-10 hidden w-48 rounded-lg bg-white p-3 shadow dark:bg-gray-700"
        >
            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                Choose Brand
            </h6>
            <ul class="space-y-2 text-sm" aria-labelledby="{{ $buttonId }}">
                @foreach ($items as $item)
                    <li class="flex items-center">
                        <input
                            id="{{ $checkboxName }}_{{ $item->id }}"
                            type="checkbox"
                            name="{{ $checkboxName }}"
                            value="{{ $item->id }}"
                            class="text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 h-4 w-4 rounded border-gray-300 bg-gray-100 focus:ring-2 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700"
                            {{ in_array($item->id, request()->get($checkboxName, [])) ? 'checked' : '' }}
                            onchange="this.form.submit()"
                        />
                        <label
                            for="{{ $checkboxName }}_{{ $item->id }}"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100"
                        >
                            {{ $item->name }}
                            ({{ $item->products_count ?? 0 }})
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </form>
</div>
