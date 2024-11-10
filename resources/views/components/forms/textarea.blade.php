@props([
    'label',
    'name',
    'type' => 'textarea',
])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'placeholder' => 'Enter ' . $label,
        'class' => 'focus:border-primary-500 dark:focus:ring-black-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:ring-black/10 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400',
        'value' => old($name, $attributes->get('value')), // Use old value if available, otherwise use the provided value
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea {{ $attributes->merge($defaults) }}>{{ $slot }}</textarea>
</x-forms.field>
