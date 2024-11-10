@props([
    'brand',
    'width' => 32,
    'height' => 32,
])

@if (is_object($brand) && isset($brand->image))
    <img
        src="{{ asset('storage/' . $brand->image) }}"
        alt="{{ $brand->name ?? 'Brand Logo' }}"
        class="rounded-sm"
        style="
            width: {{ $width }}px;
            height: {{ $height }}px;
            object-fit: cover;
        "
    />
@endif
