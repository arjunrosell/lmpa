@include('layouts.admin')
<x-page-title>Add New Brand</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Add New Brand</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('admin.brands.store') }}"
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
            <x-cancel href="{{ route('admin.brands.index') }}">Cancel</x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
