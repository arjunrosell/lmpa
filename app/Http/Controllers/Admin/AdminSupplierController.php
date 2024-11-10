<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;

class AdminSupplierController extends Controller
{
    private function search(SearchRequest $request)
    {
        $query = Supplier::orderBy('updated_at', 'desc');

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
        }
        return $query->paginate(15);
    }

    public function index(SearchRequest $request)
    {
        $suppliers = $this->search($request);
        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::create($request->validated());
        flash()->success("Supplier '" . e($supplier->name) . "' created successfully.");
        return redirect()->route('admin.suppliers.index');
    }

    public function show()
    {
        return redirect()->route('admin.suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {

        $supplier->fill($request->validated());

        if ($supplier->isDirty()) {
            $supplier->save();
            flash()->success("Supplier '" . e($supplier->name) . "' updated successfully.");
        } else {
            flash()->info("No changes were made to the supplier '" . e($supplier->name) . "'.");
        }
        return redirect()->route('admin.suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        flash()->success("Supplier '" . e($supplier->name) . "' deleted successfully.");
        return redirect()->route('admin.suppliers.index');
    }
}
