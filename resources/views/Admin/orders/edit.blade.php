@extends('layouts.admin')

@section('admintitle', 'Edit Customer Order')

@section('admincontent')
@section('admincontent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Order #{{ $order->order_number }}
                            <a href="{{ route('orders.index') }}" class="btn btn-danger float-end">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- User ID -->
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Customer Name</label>
                                    <input type="text" class="form-control"
                                        value="{{ $order->user->first_name }} {{ $order->user->last_name }}" disabled>
                                    <input type="hidden" name="user_id" value="{{ $order->user_id }}">
                                </div>
                                @error('user_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Order Number -->
                            <div class="mb-3">
                                <label for="order_number" class="form-label">Order Number</label>
                                <input type="text" name="order_number" id="order_number" class="form-control"
                                    value="{{ $order->order_number }}" required />
                                @error('order_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Order Date -->
                            <div class="mb-3">
                                <label for="order_date" class="form-label">Order Date</label>
                                <input type="date" name="order_date" class="form-control"
                                    value="{{ now()->toDateString() }}" required>
                                @error('order_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Products -->
                            <div class="mb-3">
                                <label for="products" class="form-label">Products</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-rows">
                                        @foreach ($order->products as $product)
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="product_ids[]"
                                                        value="{{ $product->id }}" />
                                                    {{ $product->product_name }}
                                                </td>
                                                <td>
                                                    <input type="number" name="quantities[]" class="form-control"
                                                        value="{{ $product->pivot->quantity }}" min="1" />
                                                </td>
                                                <td>
                                                    ₱{{ number_format($product->pivot->price, 2) }}
                                                </td>
                                                <td>
                                                    ₱{{ number_format($order->computed_total_amount, 2) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Discount -->
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="number" name="discount" id="discount" class="form-control"
                                    value="{{ $order->discount }}" step="0.01" />
                                @error('discount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Shipping Fee -->
                            <div class="mb-3">
                                <label for="shipping_fee" class="form-label">Shipping Fee</label>
                                <input type="number" name="shipping_fee" id="shipping_fee" class="form-control"
                                    value="{{ $order->shipping_fee }}" step="0.01" />
                                @error('shipping_fee')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--Grand Total-->
                            <div class="mb-3">
                                <label class="form-label">Grand Total</label>
                                <input type="text" class="form-control"
                                    value="₱{{ number_format($order->computed_grand_total, 2) }}" disabled>
                            </div>

                            <!--Delivery Address-->
                            <div class="mb-3">
                                <label for="delivery_address" class="form-label">Delivery Address</label>
                                <input type="text" name="delivery_address" id="delivery_address" class="form-control"
                                    value="{{ old('delivery_address', $order->delivery_address) }}" required>
                            </div>

                            <!--Delivery Method-->
                            <div class="mb-3">
                                <label for="delivery_method" class="form-label">Delivery Method</label>
                                <select name="delivery_method" id="delivery_method" class="form-select" required>
                                    <option value="standard_shipping" @selected($order->delivery_method == 'pickup')>Standard Shipping
                                    </option>
                                    <option value="express_shipping" @selected($order->delivery_method == 'delivery')>Express Shipping</option>
                                    <option value="pickup_in_store" @selected($order->delivery_method == 'delivery')>Pickup In Store</option>
                                </select>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-select">
                                    <option value="credit_card" @selected($order->payment_method == 'credit_card')>Credit Card</option>
                                    <option value="paypal" @selected($order->payment_method == 'paypal')>PayPal</option>
                                    <option value="bank_transfer" @selected($order->payment_method == 'bank_transfer')>Bank Transfer</option>
                                    <option value="cash_on_delivery" @selected($order->payment_method == 'cash_on_delivery')>Cash on Delivery
                                    </option>
                                </select>
                                @error('payment_method')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Payment Status -->
                            <div class="mb-3">
                                <label for="payment_status" class="form-label">Payment Status</label>
                                <select name="payment_status" id="payment_status" class="form-select">
                                    <option value="pending" @selected($order->payment_status == 'pending')>Pending</option>
                                    <option value="paid" @selected($order->payment_status == 'paid')>Paid</option>
                                    <option value="failed" @selected($order->payment_status == 'failed')>Failed</option>
                                    <option value="refunded" @selected($order->payment_status == 'refunded')>Refunded</option>
                                </select>
                                @error('payment_status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Order Status -->
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="pending" @selected($order->status == 'pending')>Pending</option>
                                    <option value="paid" @selected($order->status == 'paid')>Paid</option>
                                    <option value="shipped" @selected($order->status == 'shipped')>Shipped</option>
                                    <option value="delivered" @selected($order->status == 'delivered')>Delivered</option>
                                    <option value="cancelled" @selected($order->status == 'cancelled')>Cancelled</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Notes -->
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea name="notes" id="notes" class="form-control" rows="3">{{ $order->notes }}</textarea>
                                @error('notes')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Update Order</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
