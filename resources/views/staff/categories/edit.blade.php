@include('layouts.staff')
<x-page-title>{{ $category->name }}</x-page-title>
@include('layouts.staff.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Edit Category</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('staff.categories.update',  $category->id) }}"
    >
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-forms.input
                label="Category Name"
                name="name"
                :value="$category->name"
            />
        </div>
        <x-forms.textarea
            label="Category Description"
            rows="10"
            name="description"
        >
            {{ old('description', $category->description) }}
        </x-forms.textarea>
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Update</x-button>
            <x-cancel href="{{ route('staff.categories.index') }}">
                Cancel
            </x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
