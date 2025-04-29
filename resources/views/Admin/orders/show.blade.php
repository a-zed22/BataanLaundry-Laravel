@extends('layouts.admin')

@section('admintitle', 'Category Page - Show')

@section('admincontent')
    <div class="container">
        <div class="row">
            <div class="col-rd-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Show Customer Order Detail
                            <a href="{{ route('orders.index') }}" class="btn btn-danger float-end"> Back </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Name</label>
                            <p>{{ $category->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <p>{{ $category->email }}</p>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <p>{{ $category->status == 1 ? 'checked' : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
