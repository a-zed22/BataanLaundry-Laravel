<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->paginate(10);
        return view('admin.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'supplier_number' => 'nullable|string|max:50',
            'supplier_email' => 'required|email|max:255',
            'supplier_address' => 'required|string',
            'tax_id' => 'required|string|max:100',
            'supplier_status' => 'required|in:active,inactive',
            'supplier_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Supplier::create($validated);

        return redirect('/admin/suppliers')->with('success', 'Supplier Created Successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'supplier_number' => 'nullable|string|max:50',
            'supplier_email' => 'nullable|email|max:255',
            'supplier_address' => 'nullable|string',
            'tax_id' => 'nullable|string|max:100',
            'supplier_status' => 'required|in:active,inactive',
            'supplier_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $supplier->update($validated);



        return redirect()->route('suppliers.index')->with('success', 'Supplier (ID #' . $supplier->id . ' ) Updated Successfully');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/admin/suppliers')->with('success', 'Supplier (ID #' . $supplier->id . ' ) Deleted Successfully');
    }
}
