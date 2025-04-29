<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $useradmins = Admin::paginate(10);
        return view('admin.useradmin.index', compact('useradmins'));
    }

    public function create()
    {
        return view('admin.useradmin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        Admin::create($validated);

        return redirect('/admin/useradmin')->with('success', 'Admin User Created Successfully');
    }

    public function edit(Admin $useradmin)
    {
        return view('admin.useradmin.edit', compact('useradmin'));
    }

    public function update(Request $request, Admin $useradmin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,' . $useradmin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']); // If password is empty, don't update it
        }

        $useradmin->update($validated);

        return redirect('/admin/useradmin')->with('success', 'Admin User (ID #' . $useradmin->id . ') Edited Successfully');
    }

    public function destroy(Admin $useradmin)
    {
        $useradmin->delete();
        return redirect('/admin/useradmin')->with('success', 'Admin User (ID #' . $useradmin->id . ') Deleted Successfully');
    }
}
