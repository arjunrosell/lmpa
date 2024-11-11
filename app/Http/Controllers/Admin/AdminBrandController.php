<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;

class AdminBrandController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Brand::orderBy('updated_at', 'desc');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        if ($request->has('brand_filter') && $request->input('brand_filter') !== 'all') {
            $query->where('name', $request->input('brand_filter'));
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $query = Brand::query();

        if ($request->has('brands')) {
            if (!in_array('all', $request->brands)) {
                $query->whereIn('id', $request->brands);
            }
        }

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $allBrands = Brand::withCount('products')->get();

        $brands = $query->paginate(10);

        return view('admin.brands.index', compact('brands', 'allBrands'));
    }


    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('brands/logo');
        $brand = Brand::create($validated);
        flash()->success("Brand '" . e($brand->name) . "' created successfully.");
        return redirect()->route('admin.brands.index');
    }

    public function show()
    {
        return redirect()->route('admin.brands.index');
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            File::delete(storage_path('app/public/' . $brand->image));
            $validated['image'] = $request->file('image')->store('brands/logo');
        }
        $brand->fill($validated);
        if ($brand->isDirty()) {
            $brand->save();
            flash()->success("Brand '" . e($brand->name) . "' updated successfully.");
        } else {
            flash()->info("No changes were made to the brand '" . e($brand->name) . "'.");
        }
        return redirect()->route('admin.brands.index');
    }

    public function destroy(Brand $brand)
    {
        File::delete(storage_path('app/public/' . $brand->image));
        $brand->delete();
        flash()->success("Brand '" . e($brand->name) . "' deleted successfully.");
        return redirect()->route('admin.brands.index');
    }
}
