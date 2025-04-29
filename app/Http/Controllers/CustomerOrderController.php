<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'user.profile',
            'products'
        ])->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.orders.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'nullable|array',
            'quantities.*' => 'nullable|integer|min:1|max:100',


            'order_number' => 'required|string|unique:orders,order_number',
            'order_date' => 'required|date',
            'discount' => 'nullable|numeric|max:99999999.99',
            'shipping_fee' => 'nullable|numeric|max:99999999.99',
            'delivery_address' => 'nullable|string',
            'delivery_method' => 'required|in:standard_shipping,express_shipping,pickup_in_store',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer,cash_on_delivery',
            'payment_status' => 'required|in:pending,paid,failed,refunded',

            'notes' => 'nullable|string',
            'status' => 'required|in:pending,processing,completed,cancelled', // assuming this too is enum

        ]);

        $productIds = $request->product_ids;
        $quantities = $request->quantities;
        $discount = $request->discount ?? 0;
        $shipping = $request->shipping_fee ?? 0;
        $subtotal = 0;
        $totalQuantity = 0;  // For total quantity

        foreach ($productIds as $index => $productId) {
            $product = Product::findOrFail($productId);
            $qty = $quantities[$index] ?? 1;
            $subtotal += $product->product_price * $qty;
            $totalQuantity += $qty;
        }

        $grandTotal = $subtotal + $shipping - $discount;

        // Create order
        $order = Order::create([
            'user_id' => $request->user_id,
            'order_number' => $request->order_number,
            'order_date' => Carbon::parse($request->order_date)->setTimeFrom(Carbon::now()), // <-- this!
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping_fee' => $shipping,
            'grand_total' => $grandTotal,
            'delivery_address' => $request->delivery_address,
            'delivery_method' => $request->delivery_method,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'notes' => $request->notes,
            'total_quantity' => $totalQuantity,
            'status' => 'pending',  // Set a default status, like 'pending'
        ]);

        $attachData = [];

        foreach ($productIds as $index => $productId) {
            $product = Product::findOrFail($productId);
            $qty = $quantities[$index] ?? 1;
            $price = $product->product_price;

            $attachData[$productId] = [
                'quantity' => $qty,
                'price' => $price,
                'subtotal' => $price * $qty,
                'shipping_fee' => 0,
            ];
        }

        $order->products()->attach($attachData);

        return redirect('/admin/orders')->with('success', 'Order placed successfully!');
    }


    public function show(Order $order)
    {
        $order->load('products', 'user');
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all();
        $products = Product::all();
        $order->load('products');
        return view('admin.orders.edit', compact('order', 'users', 'products'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'order_number' => 'required|string',
            'order_date' => 'required|date',
            'product_ids' => 'required|array',
            'quantities' => 'required|array',
            'payment_status' => 'required|string',
            'status' => 'required|string',
        ]);

        $productIds = $request->product_ids;
        $quantities = $request->quantities;
        $discount = $request->discount ?? 0;
        $shipping = $request->shipping_fee ?? 0;
        $subtotal = 0;
        $totalQuantity = 0;

        // 🔥 Load products once only
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        $attachData = [];

        foreach ($productIds as $index => $productId) {
            $product = $products->get($productId);

            if (!$product) {
                return back()->withErrors(['product_ids' => 'Invalid product selected.']);
            }

            $qty = $quantities[$index] ?? 1;
            $price = $product->product_price;

            $subtotal += $price * $qty;
            $totalQuantity += $qty;

            $attachData[$productId] = [
                'quantity' => $qty,
                'price' => $price,
                'subtotal' => $price * $qty,
            ];
        }

        $grandTotal = $subtotal + $shipping - $discount;

        $order->update([
            'user_id' => $request->user_id,
            'order_number' => $request->order_number,
            'order_date' => Carbon::parse($request->order_date)->setTimeFrom(Carbon::now()), // <-- this!
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping_fee' => $shipping,
            'grand_total' => $grandTotal,
            'delivery_address' => $request->delivery_address,
            'delivery_method' => $request->delivery_method,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
            'notes' => $request->notes,
            'total_quantity' => $totalQuantity,
            'status' => $request->status,
        ]);

        $order->products()->sync($attachData);

        return redirect('/admin/orders')->with('success', 'Order (ID #' . $order->id . ') Updated Successfully!');
    }

    public function destroy(Order  $order)
    {
        $order->delete();
        return redirect('/admin/orders')->with('success', 'Order (ID #' . $order->id . ') Deleted Successfully!');
    }
}
