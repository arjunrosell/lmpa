<?php

namespace App\Http\Controllers\Client;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class ClientBrandController extends Controller
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
        return view('client.brands.index', compact('brands', 'allBrands'));
    }
}
