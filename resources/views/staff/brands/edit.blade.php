@include('layouts.staff')
<x-page-title>{{ $brand->name }}</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Edit Brand</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('staff.brands.update',  $brand->id) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-forms.input
                label="Brand Name"
                name="name"
                :value="$brand->name"
            />
        </div>

        <x-forms.file-input
            name="image"
            label="Brand Logo"
            accept="image/*"
            :required="false"
            helpText="SVG, PNG, JPG, WEBP"
        />

        <x-forms.textarea
            label="Brand Description"
            rows="10"
            name="description"
        >
            {{ old('description', $brand->description) }}
        </x-forms.textarea>

        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Update</x-button>
            <x-cancel href="{{ route('staff.brands.index') }}">Cancel</x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
