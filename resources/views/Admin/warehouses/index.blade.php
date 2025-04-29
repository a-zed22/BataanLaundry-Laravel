@extends('layouts.admin')

@section('admintitle', 'Warehouses List')

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
                        <h5 class="mb-0">Warehouse List</h5>
                        <a href="{{ route('warehouses.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Add Warehouse
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-hover table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Capacity</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($warehouses as $warehouse)
                                        <tr class="text-center">
                                            <td>{{ $warehouse->id }}</td>
                                            <td  style="min-width:150px; white-space: normal;">{{ $warehouse->name }}</td>
                                            <td class="text-start" style="min-width: 250px; white-space: normal;">{{ $warehouse->location }}</td>
                                            <td>{{ $warehouse->capacity ?? '-' }}</td>
                                            <td style="min-width: 150px; white-space: normal;">{{ $warehouse->contact_number ?? '-' }}</td>
                                            <td>
                                                <span class="badge {{ $warehouse->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ ucfirst($warehouse->status) }}
                                                </span>
                                            </td>

                                             {{-- Updates --}}
                                             <td style="min-width: 250px; font-size:12px; white-space: normal;" class="text-start">
                                                Created: {{ $warehouse->created_at->format('F d, Y h:i A') }}<br>
                                                Last modified: {{ $warehouse->updated_at->format('F d, Y h:i A') }}<br>
                                                Updated by: {{ $warehouse->updated_by ? App\Models\Admin::find($warehouse->updated_by)->name : 'N/A' }}
                                            </td>

                                            <td>
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="{{ route('warehouses.edit', $warehouse->id) }}" title="Edit" class="fs-6 text-success icon-hover">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('warehouses.destroy', $warehouse->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
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
                                            <td colspan="7" class="text-center text-muted">No warehouses found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $warehouses->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
