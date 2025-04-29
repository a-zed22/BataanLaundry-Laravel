@extends('layouts.admin')

@section('admintitle', 'Customer Orders')

@section('admincontent')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h5 class="mb-0">Customer Orders</h5>
                    <a href="{{ route('orders.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-lg"></i> Add Order
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: auto;"> 
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Order Date</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Shipping</th>
                                    <th>Grand Total</th>
                                    <th>Delivery Address</th>
                                    <th>Delivery Method</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($orders as $order)
                                    <tr class="text-center"> 
                                        <td>{{ $order->id }}</td>
                                        <td class="text-start">
                                            Name: {{ $order->user->first_name ?? '-' }} {{ $order->user->last_name ?? '-' }} <br>
                                            User ID: {{ $order->user->id }}
                                        </td>
                                     
                                        
                                        <td>{{ $order->order_date->format('F d, Y h:i A') }}</td>

                                        <td class="text-start">
                                            @foreach ($order->products as $product)
                                                <div>
                                                    <strong>{{ $product->product_name ?? 'N/A' }}</strong> (ID:{{ $product->id }})<br>
                                                    SKU: {{ $product->product_sku }} <br>
                                                    Stock: {{ $product->stock_quantity }}
                                                </div>
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ($order->products as $product)
                                                ₱{{ number_format($product->pivot->price, 2) }}<br>
                                            @endforeach
                                        </td>

                                        <td>
                                            @foreach ($order->products as $product)
                                                {{ $product->pivot->quantity }}<br>
                                            @endforeach
                                        </td>

                                        <td>₱{{ number_format($order->computed_total_amount, 2) }}</td>
                                        <td>₱{{ number_format($order->discount ?? 0, 2) }}</td>
                                        <td>₱{{ number_format($order->shipping_fee ?? 0, 2) }}</td>
                                        <td>₱{{ number_format($order->computed_grand_total, 2) }}</td>
                                        <td class="text-start" >{{ $order->delivery_address ?? '-' }}</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $order->delivery_method)) }}</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $order->payment_method)) }}</td>
                                        <td>
                                            <span class="badge {{ $order->payment_status == 'paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                                                {{ ucfirst($order->payment_status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $order->status == 'completed' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="text-start">{{ $order->notes ?? '-' }}</td>

                                        <td class="text-start">
                                            <div>Created: {{ $order->created_at->format('F d, Y h:i A') }}</div>
                                            <div>Last Modified: {{ $order->updated_at->format('F d, Y h:i A') }}</div>
                                            <div>Updated by: {{ $order->updated_by ? App\Models\Admin::find($order->updated_by)->name : 'N/A' }}</div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="d-flex justify-content-center gap-3">

                                            <button class="btn p-0 border-0 bg-transparent text-info fs-6" title="Show" data-bs-toggle="modal" data-bs-target="#showModal{{ $order->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                                <a href="{{ route('orders.edit', $order->id) }}" title="Edit" class="fs-6 text-success icon-hover">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn p-0 border-0 bg-transparent" title="Delete">
                                                        <i class="bi bi-trash3 text-danger fs-6 icon-hover"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Show Modal -->
                                    <div class="modal fade" id="showModal{{ $order->id }}" tabindex="-1"
                                        aria-labelledby="showModalLabel{{ $order->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="showModalLabel{{ $order->id }}">
                                                        Order Details - {{ $order->user->first_name }} {{ $order->user->last_name }}
                                                        #{{ $order->order_number }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>User:</strong> {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
                                                    <p><strong>Order Date:</strong> {{ $order->created_at->format('F d, Y h:i A') }}</p>
                                                    <p><strong>Products:</strong>
                                                        @foreach ($order->products as $product)
                                                            {{ $product->product_name ?? 'N/A' }} (ID:{{ $product->id }}) | Stock: {{ $product->stock_quantity }}<br>
                                                        @endforeach
                                                    </p>
                                                    <p><strong>Total:</strong> ₱{{ number_format($order->computed_grand_total, 2) }}</p>
                                                    <p><strong>Payment:</strong> {{ ucwords(str_replace('_', ' ', $order->payment_method)) }} - {{ ucfirst($order->payment_status) }}</p>
                                                    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
                                                    <p><strong>Delivery Address:</strong> {{ $order->delivery_address }}</p>
                                                    <p><strong>Notes:</strong> {{ $order->notes ?? '-' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <tr>
                                        <td colspan="20" class="text-center text-muted">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
