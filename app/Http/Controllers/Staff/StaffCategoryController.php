<?php

namespace App\Http\Controllers\Staff;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class StaffCategoryController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Category::orderBy('updated_at', 'desc');
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }
        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $categories = $this->search($request);
        return view('staff.categories.index', compact('categories'));
    }

    public function create()
    {
        return view("staff.categories.create");
    }

    public function store(StoreCategoryRequest $request)
    {

        $category = Category::create($request->validated());
        flash()->success("Category '" . e($category->name) . "' created successfully.");

        return redirect()->route('staff.categories.index');
    }

    public function show()
    {
        return redirect()->route('staff.categories.index');
    }

    public function edit(Category $category)
    {

        return view('staff.categories.edit', compact('category'));
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

        return redirect()->route('staff.categories.index');
    }
}
