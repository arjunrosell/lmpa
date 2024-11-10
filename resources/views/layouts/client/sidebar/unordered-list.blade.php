@props([
    'id',
])

<ul id="{{ $id }}" class="hidden space-y-2 py-2">
    {{ $slot }}
</ul>
