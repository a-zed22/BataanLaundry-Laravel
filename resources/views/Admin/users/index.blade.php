@extends('layouts.admin')

@section('admintitle', 'Customer User List')

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
                    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center rounded-top-4">
                        <h5 class="mb-0">Customer User List</h5>
                        <a href="{{ route('users.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Add User
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive" style="overflow-x: auto;">
                            <table class="table table-hover table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($users as $user)
                                        <tr class="text-center">
                                            <td>{{ $user->id }}</td>
                                            <td class="text-start">{{ $user->first_name }}</td>
                                            <td class="text-start">{{ $user->last_name }}</td>
                                            <td class="text-start">{{ $user->email }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center gap-3">
                                                    <a href="{{ route('users.edit', $user->id) }}" title="Edit" class="fs-6 text-success icon-hover">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this product?')">
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
                                            <td colspan="6" class="text-center text-muted">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $users->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
