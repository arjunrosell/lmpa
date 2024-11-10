@include('layouts.admin')
<x-page-title>{{ $product->name }}</x-page-title>
@include('layouts.admin.sidebar.navigation-menu')

<x-forms.container>
    <x-forms.title>Edit Product</x-forms.title>
    <x-forms.divider />
    <x-forms.form
        method="POST"
        action="{{ route('admin.products.update', $product->id) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-6">
            <x-forms.input
                label="Product Name"
                name="name"
                :value="$product->name"
            />
            <x-forms.input
                type="number"
                label="Stock"
                name="stock"
                :value="$product->stock"
            />
            <x-forms.select type="select" label="Brand" name="brand_id">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                    <option
                        value="{{ $brand->id }}"
                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}
                    >
                        {{ $brand->name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input
                type="number"
                label="Price"
                name="price"
                :value="$product->price"
            />
            <x-forms.select type="select" label="Category" name="category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ $category->id == $product->category_id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.select type="select" label="Supplier" name="supplier_id">
                <option value="">Select Supplier</option>
                @foreach ($suppliers as $supplier)
                    <option
                        value="{{ $supplier->id }}"
                        {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}
                    >
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </x-forms.select>
        </div>
        <x-forms.file-input
            name="image"
            label="Product Image"
            accept="image/*"
            :required="false"
            helpText="SVG, PNG, JPG, WEBP"
        />
        <x-forms.textarea
            label="Product Description"
            rows="10"
            name="description"
        >
            {{ old('description', $product->description) }}
        </x-forms.textarea>
        <div class="mt-4 flex items-center space-x-3 sm:space-x-4">
            <x-button>Update</x-button>
            <x-cancel href="{{ route('admin.products.index') }}">
                Cancel
            </x-cancel>
        </div>
    </x-forms.form>
</x-forms.container>
