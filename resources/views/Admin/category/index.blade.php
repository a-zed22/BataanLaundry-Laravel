@extends('layouts.admin')

@section('admintitle', 'Category Page')

@section('admincontent')
    <div class="container">
        <div class="row">
            <div class="col-rd-12">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endsession

                    <div class="card">
                        <div class="card-header">
                            <h2>Categories List
                                <a href="{{ route('category.create') }}" class="btn btn-primary float-end">Add Category</a>
                                </a>
                            </h2>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>{{ $category->email }}</td>
                                            <td>{{ $category->status == 1 ? 'Visible' : 'Hidden' }}</td>
                                            <td>
                                                <a href="{{ route('category.edit', $category->id) }}"
                                                    class="btn btn-success">Edit</a>
                                                <a href="{{ route('category.show', $category->id) }}"
                                                    class="btn btn-info">Show</a>

                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                    class='d-inline'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="Submit" class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $categories->links() }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
