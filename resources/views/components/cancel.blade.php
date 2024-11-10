<a
    {{
        $attributes([
            'class' => 'flex items-center justify-center text-gray-900 border border-gray-200 hover:bg-gray-100 bg-white hover:bg-accent-400 border-gray-200 focus:ring-1 focus:ring-gray-500/10 font-medium rounded-lg text-sm px-4 py-2',
            'type' => 'button',
        ])
    }}
>
    {{ $slot }}
</a>
