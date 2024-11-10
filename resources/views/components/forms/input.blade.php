@props([
    'label',
    'name',
    'type' => 'text',
])

@php
    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'class' => 'focus:ring-primary-600 focus:border-primary-600 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400',
        'placeholder' => 'Enter ' . $label,
        'value' => trim(old($name, $attributes['value'])), // Use old value if available, otherwise use the provided value
        'required' => '',
    ];
@endphp

<x-forms.field :$label :$name>
    <div class="relative">
        <input
            {{ $attributes->merge($defaults) }}
        />
        @if ($type === 'password')
            <span
                class="absolute inset-y-0 right-0 flex cursor-pointer items-center pr-3"
                onclick="togglePassword('{{ $name }}', '{{ $name }}-eye')"
            >
                <span id="{{ $name }}-eye" class="eye-icon">
                    <!-- Default Eye Icon (Closed) -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"
                        />
                    </svg>
                </span>
            </span>
        @endif
    </div>
</x-forms.field>
