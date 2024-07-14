<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    // Role Index
    public function index(): View
    {
        $roles = Role::all();
        return view('backend.roles.index', compact('roles'));
    } // End Index

    // Role Create
    public function create(): View
    {
        return view('backend.roles.create');
    } // End Create

    // Role Store
    public function store(Request $request): RedirectResponse
    {
        // Validate Request
        $request->validate([
            'role_name' => 'required',
        ]);

        // Create a new role
        Role::create([
            'name' => $request['role_name'],
            'guard_name' => 'web',
        ]);

        // Notification
        $notification = array(
            'message' => 'Role created successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('roles.index')->with($notification);

    } // End Store

    // Role Edit
    public function edit($id): View
    {
        $role = Role::findorFail($id);
        return view('backend.roles.edit', compact('role'));
    } // End Edit

    // Role Update
    public function update(Request $request): RedirectResponse
    {
        // Validate Request
        $request->validate([
            'role_name' => 'required',
        ]);

        // Find the role by id
        $role = Role::findorFail($request['role_id']);

        // Update the role
        $role->update([
            'name' => $request['role_name'],
        ]);

        // Notification
        $notification = array(
            'message' => 'Role updated successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('roles.index')->with($notification);
    } // End Update

    // Role Delete
    public function delete($id): RedirectResponse
    {
        // Find the role by id
        $role = Role::findorFail($id);

        // Delete the role
        $role->delete();

        // Notification
        $notification = array(
            'message' => 'Role deleted successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('roles.index')->with($notification);
    } // End Delete
}
