<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerRegistration extends Controller
{
    public function create() {
        return view('customerregister');
    }
    
    public function store(Request $request) {
        $validated = $request->validate([
            'store_name' => 'required|string|max:255',
            'store_location' => 'required|string|max:255',
            'store_contact' => 'nullable|string|max:255',
            'store_email' => 'nullable|email|max:255',
    
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6',
        ]);
    
        // Create Store
        $store = Store::create([
            'store_name' => $validated['store_name'],
            'store_location' => $validated['store_location'],
            'store_contact' => $validated['store_contact'],
            'store_email' => $validated['store_email'],
        ]);
    
        // Create Customer linked to store
        User::create([
            'store_id' => $store->id,
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);
        
    
    return redirect()->route('customerprofile')->with('success', 'Registered successfully!');
    }

    public function profile()
{
    // For now, just get the latest customer
    $customer = User::with('store')->latest()->first();

    return view('customerprofile', compact('customer'));
}
}