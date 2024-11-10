@include('layouts.staff')
<x-page-title>Brands</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Add New Brand</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('staff.brands.store') }}"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="mb-4">
            <x-forms.input label="Brand Name" name="name" />
        </div>

        <x-forms.file-input
            name="image"
            label="Brand Logo"
            accept="image/*"
            :required="true"
            helpText="SVG, PNG, JPG, WEBP"
        />

        <x-forms.textarea
            label="Brand Description"
            rows="10"
            name="description"
        />

        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Add Brand</x-button>
            <x-cancel href="{{ route('staff.brands.index') }}">Cancel</x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
