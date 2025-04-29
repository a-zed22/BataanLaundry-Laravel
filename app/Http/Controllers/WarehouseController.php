<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::latest()->paginate(10);
        return view('admin.warehouses.index', compact('warehouses'));
    }

    public function create()
    {
        return view('admin.warehouses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|integer',
            'contact_number' => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
        ]);

        Warehouse::create($validated);

        return redirect('/admin/warehouses')->with('success', 'Warehouse Created Successfully');
    }

    public function edit(Warehouse $warehouse)
    {
        return view('admin.warehouses.edit', compact('warehouse'));
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'capacity' => 'nullable|integer',
            'contact_number' => 'nullable|string|max:20',
            'status' => 'required|in:active,inactive',
        ]);

        $warehouse->update($validated);

        return redirect('/admin/warehouses')->with('success', 'Warehouse (ID #' . $warehouse->id . ') Updated Successfully');
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect('/admin/warehouses')->with('success', 'Warehouse (ID #' . $warehouse->id . ') Deleted Successfully');
    }
}
