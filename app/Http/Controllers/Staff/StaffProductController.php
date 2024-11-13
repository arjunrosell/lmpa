<?php

namespace App\Http\Controllers\Staff;

use App\Models\Brand;
use App\Models\Product;
use App\Events\LowStock;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class StaffProductController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Product::with(['category', 'brand', 'supplier']);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('sku', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%");
        }

        if ($request->filled('brand') && $request->input('brand') !== 'all') {
            $query->where('brand_id', $request->input('brand'));
        }

        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'created_asc':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'created_desc':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('updated_at', 'desc');
            }
        } else {
            $query->orderBy('updated_at', 'desc');
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $products = $this->search($request);
        $brands = Brand::all();

        return view('staff.products.index', compact('products', 'brands'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $brands = Brand::all();

        return view('staff.products.create', compact(['categories', 'suppliers', 'brands']));
    }

    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('products');
        $product = Product::create($validatedData);

        flash()->success("Product '" . e($product->name) . "' created successfully.");

        if ($product->stock < 10) {
            event(new LowStock($product));
        }

        return redirect()->route('staff.products.index');
    }

    public function show(Product $product)
    {
        return view('staff.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load(['category', 'brand', 'supplier']);
        $categories = Category::all();
        $suppliers = Supplier::all();
        $brands = Brand::all();

        return view('staff.products.edit', compact('product', 'categories', 'suppliers', 'brands'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        if (is_null($validated['brand_id'])) {
            return redirect()->back()->withErrors(['brand_id' => 'Brand cannot be empty.']);
        }
        if (is_null($validated['category_id'])) {
            return redirect()->back()->withErrors(['category_id' => 'Category cannot be empty.']);
        }
        if (is_null($validated['supplier_id'])) {
            return redirect()->back()->withErrors(['supplier_id' => 'Supplier cannot be empty.']);
        }

        if ($request->hasFile('image')) {
            File::delete(storage_path('app/public/' . $product->image));
            $validated['image'] = $request->file('image')->store('products');
        }

        $oldStock = $product->stock;

        $product->fill($validated);

        if ($product->isDirty()) {
            $product->save();
            flash()->success("Product '" . e($product->name) . "' updated successfully.");

            if ($product->isDirty('stock') && $product->stock < 10) {
                event(new LowStock($product));
            }

            if ($product->stock < $oldStock && $product->stock < 10) {
                event(new LowStock($product));
            }
        } else {
            flash()->info("No changes were made to the product '" . e($product->name) . "'.");
        }

        return redirect()->route('staff.products.index');
    }
}
