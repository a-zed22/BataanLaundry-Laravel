@extends('layouts.admin')

@section('admintitle', 'Add Customer Order')

@section('admincontent')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Order</h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf


                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Customer Selection -->
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Customer</label>
                                <select name="user_id" class="form-control" required>
                                    <option value="">Select Customer</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->first_name }} {{ $user->last_name }} (ID:
                                            {{ $user->id }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Order Info -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Order Number</label>
                                    <input type="text" name="order_number" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Order Date</label>
                                    <input type="date" name="order_date" class="form-control"
                                        value="{{ now()->toDateString() }}" required>
                                </div>
                            </div>

                            <!-- Products -->
                            <div class="row mb-2 product-row">
                                <div class="col-md-4">
                                    <label>Products</label>
                                    <select name="product_ids[]" class="form-control product-select" required>
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" data-price="{{ $product->product_price }}"
                                                data-stock="{{ $product->stock_quantity }}">
                                                {{ $product->product_name }} (ID: {{ $product->id }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Stock (Initially empty) -->
                                <div class="col-md-2">
                                    <label>Product Stock</label>
                                    <input type="text" class="form-control stock-quantity" value="" disabled>
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-2">
                                    <label>Quantity</label>
                                    <input type="number" name="quantities[]" class="form-control quantity-input"
                                        value="{{ $product->pivot->quantity ?? 1 }}" min="1" required>
                                </div>
                                

                                <!-- Price (Initially empty) -->
                                <div class="col-md-2">
                                    <label>Price</label>
                                    <input type="number" name="prices[]" class="form-control price-input" value=""
                                        step="0.01" min="0" required>
                                </div>
                            </div>
                            <button type="button" id="add-product" class="btn btn-sm btn-primary">Add
                                Product</button>
                            <button type="button" class="btn btn-sm btn-danger remove-product">Remove</button>
                    </div>

                </div>

                <!-- Pricing -->
                <div class="row">
                    <!-- Subtotal (READONLY) -->
                    <div class="col-md-4 mb-3">
                        <label>Subtotal</label>
                        <input type="text" class="form-control subtotal-output" readonly required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Discount</label>
                        <!-- Discount Input -->
                        <input type="number" name="discount" class="form-control" id="discount-input"
                            value="{{ old('discount', 0) }}" step="0.01">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Shipping Fee</label>
                        <!-- Shipping Fee Input -->
                        <input type="number" name="shipping_fee" class="form-control" id="shipping-fee-input"
                            value="{{ old('shipping_fee', 0) }}" step="0.01" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Grand Total</label>
                        <!-- Grand Total (READONLY) -->
                        <input type="text" class="form-control" id="grand-total-output" readonly required>
                    </div>
                </div>
                
                <!-- Other Fields -->
                <div class="mb-3">
                    <label>Delivery Address</label>
                    <textarea name="delivery_address" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="delivery_method" class="form-label">Delivery Method</label>
                    <select name="delivery_method" class="form-control" required>
                        <option value="">Select Delivery Method</option>
                        <option value="standard_shipping">Standard Shipping</option>
                        <option value="express_shipping">Express Shipping</option>
                        <option value="pickup_in_store">Pickup In Store</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Payment Method</label>
                        <select name="payment_method" class="form-control" required>
                            <option value="">Select Payment Method</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="cash_on_delivery">Cash on Delivery</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Payment Status</label>
                        <select name="payment_status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="paid">Paid</option>
                            <option value="failed">Failed</option>
                            <option value="refunded">Refunded</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Order Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Paid</option>
                            <option value="completed">Shipped</option>
                            <option value="completed">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label>Notes</label>
                    <textarea name="notes" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Order</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        function calculateTotals() {
            let total = 0;

            document.querySelectorAll('.product-row').forEach(row => {
                const qty = parseFloat(row.querySelector('.quantity-input')?.value) || 0;
                const price = parseFloat(row.querySelector('.price-input')?.value) || 0;
                const rowSubtotal = qty * price;

                total += rowSubtotal;
            });

            const discount = parseFloat(document.getElementById('discount-input')?.value) || 0;
            const shipping = parseFloat(document.getElementById('shipping-fee-input')?.value) || 0;
            const grandTotal = total + shipping - discount;

            document.querySelector('.subtotal-output').value = total.toFixed(2);
            document.getElementById('grand-total-output').value = grandTotal.toFixed(2);
        }

        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('quantity-input')) {
                checkMaxQuantity(e.target); // <-- ADD THIS LINE HERE
            }

            if (
                e.target.classList.contains('quantity-input') ||
                e.target.classList.contains('price-input') ||
                e.target.id === 'discount-input' ||
                e.target.id === 'shipping-fee-input'
            ) {
                calculateTotals();
            }
        });

        // Auto-set price based on selected product
        document.addEventListener('change', function(e) {
            if (e.target.classList.contains('product-select')) {
                const selectedOption = e.target.selectedOptions[0];
                const price = selectedOption?.getAttribute('data-price');
                const stock = selectedOption?.getAttribute('data-stock');
                const row = e.target.closest('.product-row');
                const priceInput = row?.querySelector('.price-input');
                const stockInput = row?.querySelector('.stock-quantity');
                const quantityInput = row?.querySelector('.quantity-input');

                if (priceInput && price) {
                    priceInput.value = parseFloat(price).toFixed(2);
                }

                if (stockInput && stock) {
                    stockInput.value = stock;
                }

                if (quantityInput && stock) {
                    quantityInput.setAttribute('max', stock);
                }

                calculateTotals();
            }
        });

        // Recalculate on load
        window.addEventListener('load', calculateTotals);


        function checkMaxQuantity(input) {
            // Update the max value dynamically based on the stock
            const maxStock = parseInt(input.getAttribute('max')) || 0;

            // Ensure that the input value doesn't exceed the stock quantity
            if (parseInt(input.value) > maxStock) {
                input.value = maxStock; // Set the value to max stock if it exceeds
            }
        }
    </script>
@endsection
