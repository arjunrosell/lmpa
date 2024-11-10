<x-layout>
    <x-page-title>Update Order #{{ $order->id }}</x-page-title>
    @include('layouts.staff.sidebar.navigation-menu')
    <x-forms.container>
        <x-forms.title>
            Update Order #{{ $order->id }} - {{ $order->user->name }}
        </x-forms.title>
        <x-forms.divider />
        <x-forms.form
            method="POST"
            action="{{ route('staff.orders.update', $order->id) }}"
        >
            @csrf
            @method('PUT')
            <div class="mb-4 grid gap-4 sm:grid-cols-1 sm:gap-6">
                <x-forms.select
                    type="select"
                    label="Customer Name"
                    name="user_id"
                    disabled
                >
                    <option value="{{ $order->user_id }}">
                        {{ $order->user->name }}
                    </option>
                </x-forms.select>

                <x-forms.input
                    type="date"
                    label="Order Date"
                    name="order_date"
                    :value="$order->order_date"
                />

                <x-forms.input
                    type="number"
                    label="Total Amount"
                    name="total_amount"
                    placeholder="₱2,999"
                    :value="$order->total_amount"
                />

                <x-forms.select type="select" label="Status" name="status">
                    @foreach ($statuses as $status)
                        <option
                            value="{{ $status }}"
                            {{ old('status', $order->status) == $status ? 'selected' : '' }}
                        >
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
                <x-button>Update</x-button>
                <x-cancel href="{{ route('staff.orders.index') }}">
                    Cancel
                </x-cancel>
            </div>
        </x-forms.form>
    </x-forms.container>
</x-layout>
