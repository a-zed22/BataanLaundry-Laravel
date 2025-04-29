@extends('layouts.admin')

@section('admintitle', 'Edit Product')

@section('admincontent')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Please fix the following issues:
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name *</label>
                            <input type="text" name="product_name" class="form-control" 
                                value="{{ old('product_name', $product->product_name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="product_number" class="form-label">Product Number</label>
                            <input type="text" name="product_number" class="form-control"
                                value="{{ old('product_number', $product->product_number) }}">
                        </div>

                        <div class="mb-3">
                            <label for="product_brand" class="form-label">Brand</label>
                            <input type="text" name="product_brand" class="form-control"
                                value="{{ old('product_brand', $product->product_brand) }}">
                        </div>

                        <div class="mb-3">
                            <label for="product_price" class="form-label">Price (₱) *</label>
                            <input type="number" name="product_price" class="form-control" step="0.01" min="0"
                                value="{{ old('product_price', $product->product_price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="product_description" class="form-label">Description</label>
                            <textarea name="product_description" class="form-control" rows="3">{{ old('product_description', $product->product_description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="product_sku" class="form-label">SKU</label>
                            <input type="text" name="product_sku" class="form-control"
                                value="{{ old('product_sku', $product->product_sku) }}">
                        </div>

                        <div class="mb-3">
                            <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                            <input type="number" name="stock_quantity" class="form-control" min="0"
                                value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="availability" class="form-label">Availability *</label>
                            <select name="availability" class="form-select" required>
                                <option value="in_stock" {{ old('availability', $product->availability) == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="out_of_stock" {{ old('availability', $product->availability) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                                <option value="backorder" {{ old('availability', $product->availability) == 'backorder' ? 'selected' : '' }}>Backorder</option>
                                <option value="preorder" {{ old('availability', $product->availability) == 'preorder' ? 'selected' : '' }}>Preorder</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product_status" class="form-label">Status *</label>
                            <select name="product_status" class="form-select" required>
                                <option value="active" {{ old('product_status', $product->product_status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="discontinued" {{ old('product_status', $product->product_status) == 'discontinued' ? 'selected' : '' }}>Discontinued</option>
                                <option value="pending" {{ old('product_status', $product->product_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="warehouses" class="form-label fw-bold">Warehouses</label>
                            <select name="warehouses[]" id="warehouses" multiple class="form-select select2" size="6">
                                @foreach ($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}" 
                                        data-logo="{{ asset('storage/' . $warehouse->logo) }}" 
                                        data-name="{{ $warehouse->name }}" 
                                        data-address="{{ $warehouse->address }}"
                                        {{ in_array($warehouse->id, old('warehouses', $selectedWarehouses)) ? 'selected' : '' }}>
                                        {{ $warehouse->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">(Hold Ctrl or Cmd to select multiple)</small>
                        </div>

                        <div class="mb-4">
                            <label for="suppliers" class="form-label fw-bold">Suppliers</label>
                            <select name="suppliers[]" id="suppliers" multiple class="form-select select2" size="6">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" 
                                        data-logo="{{ asset('storage/' . $supplier->supplier_logo) }}" 
                                        data-name="{{ $supplier->supplier_name }}" 
                                        data-address="{{ $supplier->supplier_address }}"
                                        {{ in_array($supplier->id, old('suppliers', $selectedSuppliers ?? [])) ? 'selected' : '' }}>
                                        {{ $supplier->supplier_name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">(Hold Ctrl or Cmd to select multiple)</small>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            templateResult: formatState,
            templateSelection: formatState
        });

        function formatState(state) {
            if (!state.id) {
                return state.text;
            }

            var logo = $(state.element).data('logo');
            var name = $(state.element).data('name');
            var address = $(state.element).data('address');

            var $state = $('<span class="d-flex align-items-center">');

            if (logo) {
                $state.append('<img src="' + logo + '" class="logo-thumbnail" />');
            } else {
                $state.append('<span class="logo-placeholder">No Logo</span>');
            }

            $state.append('<strong class="ms-2">' + name + '</strong>');

            if (address) {
                $state.append('<div class="text-muted text-xs ms-2">' + address + '</div>');
            }

            return $state;
        }
    });
</script>
@endpush

@endsection
