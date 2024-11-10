@props([
    'label',
    'name',
    'helpText' => null,
])

@php
    $defaults = [
        'type' => 'file',
        'id' => $name,
        'name' => $name,
        'class' => 'block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400',
        'required' => '',
    ];
@endphp

<x-forms.field :$label :$name>
    <input
        {{ $attributes->merge($defaults) }}
    />
    @if ($helpText)
        <p
            class="mb-4 mt-1 text-2xs text-gray-500 dark:text-gray-300"
            id="{{ $name }}_help"
        >
            {{ $helpText }}
        </p>
    @endif
</x-forms.field>
