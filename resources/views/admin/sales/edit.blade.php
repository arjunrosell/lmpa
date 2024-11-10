@include('layouts.admin')
<x-page-title>Sales #{{ $sale->id }}</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Edit sale</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('admin.sales.update', $sale->id) }}"
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
                <option value="{{ $sale->user_id }}">
                    {{ $sale->user->name }}
                </option>
            </x-forms.select>

            <x-forms.input
                type="date"
                label="Date"
                name="sale_date"
                :value="$sale->sale_date"
            />
            <x-forms.input
                type="number"
                label="Total Amount"
                name="total_amount"
                :value="$sale->total_amount"
                disabled
            />
            <x-forms.select type="select" label="Status" name="status">
                @foreach ($statuses as $status)
                    <option
                        value="{{ $status }}"
                        {{ old('status', $sale->status) == $status ? 'selected' : '' }}
                    >
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Update</x-button>
            <x-cancel href="{{ route('admin.sales.index') }}">Cancel</x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
