@include('layouts.admin')
<x-page-title>Add New Supplier</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-sidebar.navigation-menu />
<x-forms.container>
    <x-forms.title>Add New Supplier</x-forms.title>
    <x-forms.divider />
    <x-forms.form method="POST" action="{{ route('admin.suppliers.store') }}">
        @csrf
        <div class="mb-4 grid gap-4 sm:grid-cols-1 sm:gap-6">
            <x-forms.input label="Supplier Name" name="name" />
            <x-forms.input type="number" label="Phone Number" name="phone" />
            <x-forms.input type="email" label="Email" name="email" />
            <x-forms.input label="Address" name="address" />
        </div>
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Add Supplier</x-button>
            <x-cancel href="{{ route('admin.suppliers.index') }}">
                Cancel
            </x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
