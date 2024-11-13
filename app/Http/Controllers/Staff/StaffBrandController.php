<?php

namespace App\Http\Controllers\Staff;

use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;

class StaffBrandController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Brand::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'created_asc':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'created_desc':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->orderBy('updated_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('updated_at', 'desc');
        }

        if ($request->filled('brand')) {
            $query->where('id', $request->input('brand'));
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $brands = $this->search($request);
        $allBrands = Brand::withCount('products')->get();
        return view('staff.brands.index', compact('brands', 'allBrands'));
    }

    public function create()
    {
        return view('staff.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('brands/logo');
        $brand = Brand::create($validated);

        flash()->success("Brand '" . e($brand->name) . "' created successfully.");

        return redirect()->route('staff.brands.index');
    }

    public function show()
    {
        return redirect()->route('staff.brands.index');
    }

    public function edit(Brand $brand)
    {
        return view('staff.brands.edit', compact('brand'));
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

        return redirect()->route('staff.brands.index');
    }
}
