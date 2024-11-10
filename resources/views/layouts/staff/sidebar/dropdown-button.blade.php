@props([
    'label',
    'icon',
    'controlId',
])

<button
    type="button"
    class="group flex w-full items-center rounded-lg p-2 text-sm font-medium text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
    aria-controls="{{ $controlId }}"
    data-collapse-toggle="{{ $controlId }}"
>
    <x-dynamic-component :component="$icon" class="h-5 w-5" />
    <span class="ml-3 flex-1 whitespace-nowrap text-left">{{ $label }}</span>
    <svg
        aria-hidden="true"
        class="h-6 w-6"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
        ></path>
    </svg>
</button>
