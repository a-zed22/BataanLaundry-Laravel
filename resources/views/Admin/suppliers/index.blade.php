@extends('layouts.admin')

@section('admintitle', 'Suppliers List')

@section('admincontent')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
                    <h5 class="mb-0">Supplier List</h5>
                    <a href="{{ route('suppliers.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-lg"></i> Add Supplier
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table table-hover table-bordered align-middle mb-0">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Logo</th>
                                    <th>Supplier</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($suppliers as $supplier)
                                    <tr class="text-center">
                                        <td>{{ $supplier->id }}</td>

                                        {{-- Supplier Logo --}}
                                        <td>
                                            @if ($supplier->supplier_logo)
                                                <img src="{{ asset('storage/' . $supplier->supplier_logo) }}" alt="Logo" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                            @else
                                                <span class="text-muted">No Logo</span>
                                            @endif
                                        </td>
                                        {{-- Supplier Name --}}
                                        <td class="text-start" style="min-width: 250px; white-space: normal;">
                                            Supplier Name: {{ $supplier->supplier_name }} <br>
                                            Contact Person: {{ $supplier->contact_person }} <br>
                                            Tax ID: {{ $supplier->tax_id }}
                                        </td>


                                        {{-- Supplier Email --}}
                                        <td style="min-width: 200px; white-space: normal;">{{ $supplier->supplier_email }}</td>

                                        {{-- Supplier Number (Phone) --}}
                                        <td style="min-width: 125px; white-space: normal;">{{ $supplier->supplier_number ?? '-' }}</td>

                                        {{-- Supplier Address --}}
                                        <td class="text-start" style="min-width: 150px; white-space: normal;">{{ $supplier->supplier_address }}</td>

                                        {{-- Supplier Status --}}
                                        <td>
                                            <span class="badge {{ $supplier->supplier_status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ ucfirst($supplier->supplier_status) }}
                                            </span>
                                        </td>

                                        {{-- Updates --}}
                                        <td class="text-start" style="min-width: 250px; white-space: normal;">Created: {{ $supplier->created_at->format('F d, Y h:i A')}} <br>
                                            Last updated: {{ $supplier->updated_at->format('F d, Y h:i A') }}
                                            Updated by: {{ $supplier->updated_by ? App\Models\Admin::find($supplier->updated_by)->name : 'N/A' }}
                                        </td>

                                        {{-- Actions --}}
                                        <td>
                                            <div class="d-flex justify-content-center gap-3">
                                                <a href="{{ route('suppliers.edit', $supplier->id) }}" title="Edit" class="fs-6 text-success icon-hover">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
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
                                        <td colspan="12" class="text-center text-muted">No suppliers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $suppliers->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
