@props(['icon' => null, 'route' => '#', 'label' => '', 'target' => '_self'])

<li>
    <a
        href="{{ $route }}"
        class="group flex items-center rounded-md px-3 py-3 text-sm font-semibold text-gray-900 transition duration-75 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
        target="{{ $target }}"
    >
        @if ($icon)
            <x-dynamic-component
                :component="$icon"
                class="h-5 w-5 flex-shrink-0 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
            />
        @endif

        <span class="ml-3">{{ $label }}</span>
    </a>
</li>
