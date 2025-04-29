@extends('layouts.admin')

@section('admintitle', 'Category Page - Create')

@section('admincontent')

    <div class="container">
        <div class="row">
            <div class="col-rd-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Category
                            <a href="{{ route('category.index') }}" class="btn btn-danger float-end"> Back </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" checked style="width=30px;height=30px" />
                                Checked=visible, Unchecked=hidden
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </div>
            </div>
        @endsection
