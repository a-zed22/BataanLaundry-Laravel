@extends('layouts.admin')

@section('admintitle', 'Products List')

@section('admincontent')
    <div class="container-fluid py-4"> {{-- made it fluid --}}
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
                        <h5 class="mb-0">Product List</h5>
                        <a href="{{ route('products.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Add Product
                        </a>
                    </div>

                    <form action="" method="GET">
                        <div class="card-body bg-light rounded-bottom-4">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label for="filterDate" class="form-label fw-semibold">Filter by Date</label>
                                    <input type="date" id="filterDate" name="date" value="{{ Request::get('date') }}" class="form-control shadow-sm" />
                                </div>
                    
                                <div class="col-md-4">
                                    <label for="filterStatus" class="form-label fw-semibold">Filter by Status</label>
                                    <select id="filterStatus" name="status" class="form-select shadow-sm">
                                        <option value="">All Statuses</option>
                                        <option value="active" {{ Request::get('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="discontinued" {{ Request::get('status') == 'discontinued' ? 'selected' : '' }}>Discontinued</option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                </div>
                    
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary me-2 w-100">
                                        <i class="bi bi-funnel-fill me-1"></i> Filter
                                    </button>
                                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-x-circle me-1"></i> Reset
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>

                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: auto;"> {{-- makes it scrollable on small screens --}}
                            <table class="table table-hover table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        @php
                                        $currentSortBy = request('sort_by');
                                        $currentSortOrder = request('sort_order', 'asc');
                                    @endphp
                                    
                                    <th>
                                        <a href="{{ route('products.index', ['sort_by' => 'id', 'sort_order' => $currentSortBy === 'id' && $currentSortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                            ID {!! $currentSortBy === 'id' ? ($currentSortOrder === 'asc' ? '↑' : '↓') : '' !!}
                                        </a>
                                    </th>
                                    <th>
                                        <a href="{{ route('products.index', ['sort_by' => 'product_name', 'sort_order' => $currentSortBy === 'product_name' && $currentSortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                            Product {!! $currentSortBy === 'product_name' ? ($currentSortOrder === 'asc' ? '↑' : '↓') : '' !!}
                                        </a>
                                    </th>
                                    
                                        <th>SKU</th>
                                        <th>Price</th>
                                        <th>Warehouse</th>
                                        <th>Supplier</th>
                                        <th>Stock</th>
                                        <th>Availability</th>
                                        <th>Status</th>
                                        <th>Date</th>                                         
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($products as $product)
                                        <tr class="text-center">
                                            <td>{{ $product->id }}</td>
                                            <td class="text-start">
                                                Product Name: {{ $product->product_name }} <br>
                                                Product Number: {{ $product->product_number }} <br>
                                                Brand: {{ $product->product_brand }} </td>
                                                <td>{{ $product->product_sku }}</td>
                                            <td>₱{{ number_format($product->product_price, 2) }}</td>
                                            
                                            <td>
                                                @if ($product->warehouses->isNotEmpty())
                                                <ul class="text-start">
                                                    @foreach ($product->warehouses as $warehouse)
                                                            <li>{{ $warehouse->name }}</li>
                                                    @endforeach
                                                </ul>
                                                @else
                                                <strong> No Warehouse </strong> 
                                                @endif
                                            </td>
                                            
                                            <td>
                                                @if ($product->suppliers->isNotEmpty())
                                                    <ul class="text-start">
                                                        @foreach ($product->suppliers as $supplier)
                                                            <li>{{ $supplier->supplier_name }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <strong> No Supplier </strong> 
                                                @endif
                                            </td>
                                            

                                            <td style="white-space: nowrap;">{{ $product->stock_quantity }}</td>
                                            <td>
                                                <span class="badge 
                                                {{ $product->availability == 'out_of_stock' ? 'bg-danger' : 
                                                    ($product->availability == 'in_stock' ? 'bg-success' : 
                                                        ($product->availability == 'backorder' ? 'bg-warning text-dark' : 'bg-info text-dark')
                                                    ) 
                                                }}">
                                                {{ ucfirst(str_replace('_', ' ', $product->availability)) }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge 
                                                    {{ $product->product_status == 'active' ? 'bg-success' : 
                                                    ($product->product_status == 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                                    {{ ucfirst($product->product_status) }}
                                                </span>
                                            </td>

                                            {{-- Updates --}}
                                            <td class="text-start">
                                                Created: {{ $product->created_at->format('F d, Y h:i A') }}<br>
                                                Last modified: {{ $product->updated_at->format('F d, Y h:i A') }}<br>
                                                Updated by: {{ $product->updated_by ? App\Models\Admin::find($product->updated_by)->name : 'N/A' }}
                                            </td>
                                            
                                            <td>
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="{{ route('products.edit', $product->id) }}" title="Edit" class="fs-6 text-success icon-hover">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn p-0 border-0 bg-transparent" title="Delete">
                                                            <i class="bi bi-trash3 text-danger fs-6 icon-hover"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="13" class="text-center text-muted">No products found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $products->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
