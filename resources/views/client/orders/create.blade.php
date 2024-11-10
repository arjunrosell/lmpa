<x-layout>
    <x-page-title>Add New Order</x-page-title>
    @include('layouts.staff.sidebar.navigation-menu')

    <x-forms.container>
        <x-forms.title>Add New Order</x-forms.title>
        <x-forms.divider />
        <x-forms.form method="POST" action="{{ route('staff.orders.store') }}">
            @csrf
            <div class="mb-4 grid gap-4 sm:grid-cols-1 sm:gap-6">
                <x-forms.select
                    type="select"
                    label="Customer Name"
                    name="user_id"
                >
                    <option value="">Select Customer</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </x-forms.select>

                <x-forms.select
                    label="Product Name"
                    name="product_id"
                    id="product_id"
                >
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                        <option
                            value="{{ $product->id }}"
                            data-price="{{ $product->price }}"
                        >
                            {{ $product->name }}
                        </option>
                    @endforeach
                </x-forms.select>

                <x-forms.input
                    type="date"
                    label="Order Date"
                    name="order_date"
                />

                <x-forms.input
                    type="number"
                    label="Quantity"
                    name="quantity"
                    placeholder="0"
                />

                <x-forms.input
                    type="number"
                    label="Price"
                    name="price"
                    id="product_price"
                    placeholder="0.00"
                    readonly
                />

                <x-forms.select type="select" label="Status" name="status">
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}">
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
                <x-button>Add Order</x-button>
                <x-cancel href="{{ route('admin.orders.index') }}">
                    Cancel
                </x-cancel>
            </div>
        </x-forms.form>
    </x-forms.container>

    <script>
        document
            .getElementById('product_id')
            .addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex]
                const price = selectedOption.getAttribute('data-price')
                document.getElementById('product_price').value = price
            })
    </script>
</x-layout>
