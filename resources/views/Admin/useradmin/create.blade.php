@extends('layouts.admin')

@section('admintitle', 'Add Admin User')

@section('admincontent')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
    <h2 class="text-2xl font-bold mb-6">Create New Admin</h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('useradmin.store') }}">
        @csrf
        
        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Admin Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>
        
        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Password</label>
            <input type="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="mb-4">
            <label class="block font-medium text-sm text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
        </div>

        <div class="flex items-center justify-end">
            <a href="{{ route('useradmin.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Cancel</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create
            </button>
        </div>
    </form>
</div>
@endsection