<?php

namespace App\Http\Controllers\Staff;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;

class StaffSupplierController extends Controller
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
        return view('staff.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('staff.suppliers.create');
    }

    public function store(StoreSupplierRequest $request)
    {

        $supplier = Supplier::create($request->validated());
        flash()->success("Supplier '" . e($supplier->name) . "' created successfully.");

        return redirect()->route('staff.suppliers.index');
    }

    public function show()
    {
        return redirect()->route('staff.suppliers.index');
    }

    public function edit(Supplier $supplier)
    {
        return view('staff.suppliers.edit', compact('supplier'));
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

        return redirect()->route('staff.suppliers.index');
    }
}
