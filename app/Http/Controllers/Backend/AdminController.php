<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    // View All Admins
    public function index(): View
    {
        // Get all admins
        $administrators = User::where('role', 'admin')->get();

        // Return view with all admins
        return view('backend.admin.index', compact('administrators'));
    }

    // Create Admin
    public function create(): View
    {
        $roles = Role::all();
        return view('backend.admin.create', compact('roles'));
    }

    // Store Admin
    public function store(Request $request): RedirectResponse
    {
        // Validate request
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create new admin
        $admin = new User();

        // Assign values
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role = 'admin';
        $admin->status = 'active';

        // Save admin
        $admin->save();

        // Assign role to admin
        if ($request->roles) {
            $admin->assignRole((int)$request->roles);
        }

        // Notification
        $notification = array(
            'message' => 'Admin created successfully',
            'alert-type' => 'success'
        );

        // Redirect back
        return redirect()->route('administrators.index')->with($notification);
    }

    // Edit Admin
    public function edit($id): View
    {
        // Get admin
        $admin = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.admin.edit', compact('admin', 'roles'));
    }


    // Update Admin
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate request
        $request->validate([
            'email' => 'required|email',
        ]);

        // Get admin
        $admin = User::findOrFail($id);

        // Assign values
        $admin->email = $request->email;
        // Save admin
        $admin->save();


        // Remove all roles
        $admin->roles()->detach();
        // Assign role to admin
        if ($request->roles) {
            $admin->assignRole((int)$request->roles);
        }

        // Notification
        $notification = array(
            'message' => 'Admin updated successfully',
            'alert-type' => 'success'
        );

        // Redirect back
        return redirect()->route('administrators.index')->with($notification);
    }

    // Delete Admin
    public function delete($id): RedirectResponse
    {
        // Get admin
        $admin = User::findOrFail($id);

        // Check if admin exists
        if (!is_null($admin)) {
            // Delete admin
            $admin->delete();
        }

        // Notification
        $notification = array(
            'message' => 'Admin deleted successfully',
            'alert-type' => 'success'
        );

        // Redirect back
        return redirect()->route('administrators.index')->with($notification);
    }
}
