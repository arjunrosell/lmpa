@props([
    'product',
    'width' => 32,
    'height' => 32,
])

@if (is_object($product) && isset($product->image))
    <img
        src="{{ asset('storage/' . $product['image']) }}"
        alt="{{ $product->name ?? 'Product Image' }}"
        class="rounded-sm"
        style="
            width: {{ $width }}px;
            height: {{ $height }}px;
            object-fit: cover;
        "
    />
@endif
