@include('layouts.admin')
<x-page-title>Add New Product</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')
<x-forms.container>
    <x-forms.title>Add New Product</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('admin.products.store') }}"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-6">
            <x-forms.input label="Product SKU" name="sku" />
            <x-forms.input label="Product Name" name="name" />
            <x-forms.input type="number" label="Stock" name="stock" />
            <x-forms.select type="select" label="Brand" name="brand_id">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">
                        {{ $brand->name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input type="number" label="Price" name="price" />
            <x-forms.select type="select" label="Category" name="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.select type="select" label="Supplier" name="supplier_id">
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>
        <x-forms.file-input
            name="image"
            label="Product Image"
            accept="image/*"
            :required="true"
            helpText="SVG, PNG, JPG, WEBP"
        />
        <x-forms.textarea
            label="Product Description"
            rows="10"
            name="description"
        />
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Add Product</x-button>
            <x-cancel href="{{ route('admin.products.index') }}">
                Cancel
            </x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
