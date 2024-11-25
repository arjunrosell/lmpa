<?php

namespace App\Http\Controllers\Client;

use App\Models\Sale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class ClientSalesController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Sale::with(['user', 'product'])
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->where('sales.user_id', auth()->id())
            ->select('sales.*');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('sales.id', 'LIKE', "%{$search}%")
                ->orWhereHas('product', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
        }

        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'name_asc':
                    $query->orderBy('products.name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('products.name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'created_asc':
                    $query->orderBy('sales.created_at', 'asc');
                    break;
                case 'created_desc':
                    $query->orderBy('sales.created_at', 'desc');
                    break;
                default:
                    $query->orderBy('sales.updated_at', 'desc');
            }
        } else {
            $query->orderBy('sales.updated_at', 'desc');
        }

        if ($request->filled('status')) {
            $query->where('sales.status', $request->input('status'));
        }

        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $sales = $this->search($request);
        return view('client.sales.index', compact('sales'));
    }

    public function show(Sale $sale)
    {
        if ($sale->user_id !== auth()->id()) {
            return redirect()->route('client.sales.index');
        }

        return view('client.sales.show', compact('sale'));
    }
}
