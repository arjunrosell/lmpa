<?php

namespace App\Http\Controllers\Staff;

use App\Models\User;
use App\Models\Sale;
use App\Models\Product;
use App\Events\LowStock;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Sales\StoreSaleRequest;
use App\Http\Requests\Sales\UpdateSaleRequest;

class StaffSalesController extends Controller
{

    private function search(SearchRequest $request)
    {
        $query = Sale::with(['user', 'product'])
            ->join('products', 'sales.product_id', '=', 'products.id')
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
        return view('staff.sales.index', compact('sales'));
    }
    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        return view('staff.sales.create', compact('statuses', 'users', 'products'));
    }
    public function store(StoreSaleRequest $request)
    {
        $validated = $request->validated();
        $saleData = $validated;
        $saleData['id'] = Sale::generateSaleId();

        $product = Product::findOrFail($validated['product_id']);
        if ($product->stock < $validated['quantity']) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $totalAmount = $product->price * $validated['quantity'];

        $saleData['price'] = $product->price;
        $saleData['total_amount'] = $totalAmount;

        $sale = Sale::create($saleData);
        $product->decrement('stock', $validated['quantity']);

        if ($product->stock <= 10) {
            event(new LowStock($product));
        }

        flash()->success("Sale #" . e($sale->id) . " created successfully.");
        return redirect()->route('staff.sales.index');
    }

    public function show(Sale $sale)
    {
        return view('staff.sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        return view('staff.sales.edit', compact('sale', 'statuses'));
    }

    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $validated = $request->validated();

        if ($validated['status'] === 'processing' && $sale->status === 'cancelled') {
            $product = Product::findOrFail($sale->product_id);

            if ($product->stock < $sale->quantity) {
                return redirect()->back()->withErrors(['quantity' => 'Not enough stock available to process the sale.']);
            }
            $product->decrement('stock', $sale->quantity);
            if ($product->stock <= 10) {
                event(new LowStock($product));
            }
        }

        if ($validated['status'] === 'cancelled' && $sale->status !== 'cancelled') {
            $product = Product::findOrFail($sale->product_id);
            $product->increment('stock', $sale->quantity);
        }

        $sale->fill($validated);

        if ($sale->isDirty()) {
            $sale->save();
            flash()->success("sale #" . e($sale->id) . " updated successfully.");
        } else {
            flash()->info("No changes were made to the sale #" . e($sale->id) . ".");
        }

        return redirect()->route('staff.sales.index');
    }
}
