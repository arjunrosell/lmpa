@props(['href' => null])

<div class="ml-auto block w-[130px] sm:w-auto md:hidden">
    @if ($href)
        <a
            href="{{ $href }}"
            {{
                $attributes->merge([
                    'class' => 'border-gray-200 flex items-center justify-center text-white bg-accent-300 hover:bg-accent-400 focus:ring-2 focus:ring-gray-500/10 font-medium rounded-lg text-sm px-4 py-2',
                ])
            }}
        >
            {{ $slot }}
        </a>
    @else
        <button
            {{
                $attributes->merge([
                    'type' => 'submit',
                    'class' => 'border-gray-200 flex items-center justify-center text-white bg-accent-300 hover:bg-accent-400 focus:ring-2 focus:ring-gray-500/10 font-medium rounded-lg text-sm px-4 py-2',
                ])
            }}
        >
            {{ $slot }}
        </button>
    @endif
</div>
