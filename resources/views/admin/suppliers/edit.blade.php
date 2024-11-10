@include('layouts.admin')
<x-page-title>{{ $supplier->name }}</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Edit Supplier</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('admin.suppliers.update', $supplier->id) }}"
    >
        @csrf
        @method('PUT')
        <div class="mb-4 grid gap-4 sm:grid-cols-1 sm:gap-6">
            <x-forms.input
                label="Supplier Name"
                name="name"
                :value="$supplier->name"
            />
            <x-forms.input
                type="number"
                label="Phone Number"
                name="phone"
                :value="$supplier->phone"
            />
            <x-forms.input
                type="email"
                label="Email"
                name="email"
                :value="$supplier->email"
            />
            <x-forms.input
                label="Address"
                name="address"
                :value="$supplier->address"
            />
        </div>
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Update</x-button>
            <x-cancel href="{{ route('admin.suppliers.index') }}">
                Cancel
            </x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
