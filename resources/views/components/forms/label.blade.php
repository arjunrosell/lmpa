@props([
    'name',
    'label',
])

<label
    class="text-sm font-medium text-gray-900 dark:text-white"
    for="{{ $name }}"
>
    {{ $label }}
</label>
