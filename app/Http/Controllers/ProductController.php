<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;


class ProductController extends Controller
{
    // Show all products
    public function index(Request $request)
    {
        $query = Product::query()
            ->when($request->filled('date'), function ($q) use ($request) {
                $q->whereDate('created_at', $request->date);
            })
            ->when($request->filled('status'), function ($q) use ($request) {
                $q->where('product_status', $request->status);
            })
            ->with(['warehouses', 'suppliers']);

        // Sorting logic
        $allowedSorts = ['id', 'product_name', 'product_sku', 'product_price', 'stock_quantity', 'availability', 'product_status', 'created_at'];
        $sortBy = $request->get('sort_by');
        $sortOrder = $request->get('sort_order', 'asc');

        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $products = $query->paginate(10)->appends($request->all());

        return view('admin.products.index', compact('products'));
    }




    // Show form to create a new product
    public function create()
    {
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all(); // get all warehouses
        return view('admin.products.create', compact('warehouses', 'suppliers'));
    }

    // Store new product
    public function store(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_number' => [
                'nullable',
                'string',
                Rule::unique('products', 'product_number')->ignore($product->id),
            ],
            'product_brand' => 'nullable|string|max:100',
            'product_price' => 'required|numeric|min:0',
            'product_sku' => 'required|string|unique:products,product_sku,' . $product->id,
            'stock_quantity' => 'required|integer|min:0',
            'availability' => 'required|in:in_stock,out_of_stock,backorder,preorder',
            'product_status' => 'required|in:active,discontinued,pending',
            'product_description' => 'nullable|string',
        ]);

        $product = Product::create($validatedData);

        if ($request->has('warehouses')) {
            $product->warehouses()->attach($request->input('warehouses'));
        } else {
            $product->suppliers()->detach();
        }

        if ($request->has('suppliers')) {
            $product->suppliers()->sync($request->input('suppliers'));
        } else {
            $product->suppliers()->detach();
        }

        return redirect('/admin/products')->with('success', 'Product Created Successfully');
    }

    // Show form to edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        // Assuming you already have a Warehouse model
        $warehouses = Warehouse::all();

        // Now get all the suppliers too
        $suppliers = Supplier::all(); // <--- you need this line

        // If your product has suppliers already, you might also want to get selected ones
        $selectedWarehouses = $product->warehouses()->pluck('warehouse_id')->toArray();
        $selectedSuppliers = $product->suppliers()->pluck('supplier_id')->toArray(); // optional if you want to pre-select

        return view('admin.products.edit', compact('product', 'warehouses', 'suppliers', 'selectedWarehouses', 'selectedSuppliers'));
    }

    // Update product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id); // find the specific product by ID

        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_number' => [
                'nullable',
                'string',
                Rule::unique('products', 'product_number')->ignore($product->id),
            ],
            'product_brand' => 'nullable|string|max:100',
            'product_price' => 'required|numeric|min:0',
            'product_sku' => [
                'required',
                'string',
                Rule::unique('products', 'product_sku')->ignore($product->id),
            ],
            'stock_quantity' => 'required|integer|min:0',
            'availability' => 'required|in:in_stock,out_of_stock,backorder,preorder',
            'product_status' => 'required|in:active,discontinued,pending',
            'product_description' => 'nullable|string',
        ]);

        $product->update($validatedData);

        if ($request->has('warehouses')) {
            $product->warehouses()->sync($request->input('warehouses'));
        } else {
            $product->warehouses()->detach(); // if none selected
        }

        if ($request->has('suppliers')) {
            $product->suppliers()->sync($request->input('suppliers'));
        } else {
            $product->suppliers()->detach();
        }
        return redirect('/admin/products')->with('success', 'Product (ID #' . $product->id . ') Updated Successfully');
    }

    // Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/products')->with('success', 'Product (ID #' . $product->id . ') Deleted Successfully');
    }
}
