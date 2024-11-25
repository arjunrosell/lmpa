<?php

namespace App\Http\Controllers\Client;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class ClientCategoryController extends Controller
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

        return view('client.categories.index', compact('categories', 'allCategories'));
    }
}
