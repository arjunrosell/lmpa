<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\User;
use App\Models\Product;
use App\Events\LowStock;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Sales\StoreSaleRequest;
use App\Http\Requests\Sales\UpdateSaleRequest;


class AdminSalesController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Sale::with(['user', 'product']);
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id', 'LIKE', "%{$search}%")
                ->orWhereHas('product', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                });
        }
        return $query->orderBy('updated_at', 'desc')->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $sales = $this->search($request);
        return view('admin.sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        return view('admin.sales.create', compact('statuses', 'users', 'products'));
    }

    public function store(StoreSaleRequest $request)
    {
        $validated = $request->validated();
        $salesData = $validated;
        $salesData['id'] = Sale::generateSaleId();

        $product = Product::findOrFail($validated['product_id']);
        if ($product->stock < $validated['quantity']) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough stock available.']);
        }

        $totalAmount = $product->price * $validated['quantity'];

        $salesData['price'] = $product->price;
        $salesData['total_amount'] = $totalAmount;

        $sale = Sale::create($salesData);
        $product->decrement('stock', $validated['quantity']);

        if ($product->stock <= 10) {
            event(new LowStock($product));
        }

        flash()->success("Sales #" . e($sale->id) . " created successfully.");
        return redirect()->route('admin.sales.index');
    }

    public function show(Sale $sale)
    {
        return view('admin.sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $statuses = ['pending', 'processing', 'completed', 'cancelled'];
        return view('admin.sales.edit', compact('sale', 'statuses'));
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
            flash()->success("Sales #" . e($sale->id) . " updated successfully.");
        } else {
            flash()->info("No changes were made to the sale #" . e($sale->id) . ".");
        }

        return redirect()->route('admin.sales.index');
    }

    public function destroy(Sale $sale)
    {
        $product = Product::findOrFail($sale->product_id);
        $product->increment('stock', $sale->quantity);
        $sale->delete();
        flash()->success("Sales #" . e($sale->id) . " deleted successfully and stock has been restored.");
        return redirect()->route('admin.sales.index');
    }
}
