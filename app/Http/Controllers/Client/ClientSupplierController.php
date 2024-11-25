<?php

namespace App\Http\Controllers\Client;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class ClientSupplierController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Supplier::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
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

        if ($request->filled('supplier_name')) {
            $query->where('id', $request->input('supplier_name'));
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $suppliers = $this->search($request);
        $allSuppliers = Supplier::withCount('products')->get();;

        return view('client.suppliers.index', compact('suppliers', 'allSuppliers'));
    }
}
