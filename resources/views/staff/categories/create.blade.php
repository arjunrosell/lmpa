@include('layouts.staff')
<x-page-title>Brands</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Add New Category</x-forms.title>
    <x-forms.divider />
    <x-forms.form method="POST" action="{{ route('staff.categories.store') }}">
        @csrf
        <div class="mb-4">
            <x-forms.input label="Category Name" name="name" />
        </div>
        <x-forms.textarea
            label="Category Description"
            rows="10"
            name="description"
        />
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Add Category</x-button>
            <x-cancel href="{{ route('staff.categories.index') }}">
                Cancel
            </x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
