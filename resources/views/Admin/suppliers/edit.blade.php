@extends('layouts.admin')

@section('admintitle', 'Edit Supplier')

@section('admincontent')
<div class="container py-4">
    <h1 class="mb-4">Edit Supplier</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Supplier Name</label>
                    <input type="text" name="supplier_name" class="form-control" value="{{ old('supplier_name', $supplier->supplier_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contact Person</label>
                    <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person', $supplier->contact_person) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier Number</label>
                    <input type="text" name="supplier_number" class="form-control" value="{{ old('supplier_number', $supplier->supplier_number) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier Email</label>
                    <input type="email" name="supplier_email" class="form-control" value="{{ old('supplier_email', $supplier->supplier_email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier Address</label>
                    <input type="text" name="supplier_address" class="form-control" value="{{ old('supplier_address', $supplier->supplier_address) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tax ID</label>
                    <input type="text" name="tax_id" class="form-control" value="{{ old('tax_id', $supplier->tax_id) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier Status</label>
                    <select name="supplier_status" class="form-select" required>
                        <option value="active" {{ old('supplier_status', $supplier->supplier_status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('supplier_status', $supplier->supplier_status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier Logo (Optional)</label>
                    <input type="file" name="supplier_logo" class="form-control" accept="image/*">
                    @if ($supplier->supplier_logo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $supplier->supplier_logo) }}" alt="Supplier Logo" width="120">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Notes (Optional)</label>
                    <textarea name="notes" class="form-control" rows="3">{{ old('notes', $supplier->notes) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Supplier</button>
                <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>

</div>
@endsection
