<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;


class AdminCategoryController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Category::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('id', $request->input('category'));
        }

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
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $categories = $this->search($request);
        $allCategories = Category::withCount('products')->get();

        return view('admin.categories.index', compact('categories', 'allCategories'));
    }

    public function create()
    {
        return view("admin.categories.create");
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        flash()->success("Category '" . e($category->name) . "' created successfully.");
        return redirect()->route('admin.categories.index');
    }

    public function show()
    {
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        if ($category->isDirty()) {
            $category->save();
            flash()->success("Category '" . e($category->name) . "' updated successfully.");
        } else {
            flash()->info("No changes were made to the category '" . e($category->name) . "'.");
        }
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        flash()->success("Category '" . e($category->name) . "' deleted successfully.");
        return redirect()->route('admin.categories.index');
    }
}
