<x-layout>
    <x-page-title>{{ $product->name }}</x-page-title>
    @include('layouts.staff.sidebar.navigation-menu')

    <x-forms.container>
        <div class="bg-white sm:py-4 md:py-10 lg:py-20">
            <div
                class="grid grid-cols-1 gap-8 sm:mx-auto lg:grid-cols-1 xl:grid-cols-2"
            >
                <div class="order-1 lg:order-1">
                    <img
                        class="mx-auto h-auto w-full max-w-xs object-contain md:max-w-sm lg:max-w-md xl:max-w-lg"
                        src="{{ asset('storage/' . $product['image']) }}"
                        alt="{{ $product->name }}"
                    />
                </div>

                <div class="order-2 lg:order-2">
                    <h2
                        class="mb-4 text-3xl font-bold tracking-tight text-gray-900"
                    >
                        {{ $product->name }}
                    </h2>
                    <p class="mb-8 text-gray-500">
                        {{ $product->description }}
                    </p>
                    <dl class="grid grid-cols-2 gap-x-4 gap-y-6">
                        <div class="col-span-2 border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Product ID
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->id }}
                            </dd>
                        </div>
                        <div class="col-span-2 border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Product SKU
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->sku }}
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Category
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->category->name ?? 'None' }}
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Brand
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->brand->name ?? 'None' }}
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Price
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                ₱{{ $product->price }}
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Stock
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->stock }}
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Supplier
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->supplier->name ?? 'None' }}
                            </dd>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <dt class="text-sm font-medium text-gray-500">
                                Date Created
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                {{ $product->created_at ? $product->created_at->format('Y/m/d') : '' }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </x-forms.container>
</x-layout>
