<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // Permission Index
    public function index()
    {
        $permissions = Permission::all();
        return view('backend.permissions.index', compact('permissions'));
    }

    // Permission Create
    public function create()
    {
        return view('backend.permissions.create');
    }

    // Permission Store
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'permission_name' => 'required',
            'group_name' => 'required',
        ]);

        // Create a new permission
        $permission = Permission::create([
            'name' => $request['permission_name'],
            'group_name' => $request['group_name'],
            'guard_name' => 'web',
        ]);

        // Notification
        $notification = array(
            'message' => 'Permission created successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('permissions.index')->with($notification);
    }

    // Permission Edit
    public function edit($id)
    {
        $permission = Permission::findorFail($id);
        return view('backend.permissions.edit', compact('permission'));
    }

    // Permission Update
    public function update(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'permission_name' => 'required',
            'group_name' => 'required',
        ]);

        // Find the permission by id
        $permission_id = $request['id'];

        // Update the permission
        Permission::findorFail($permission_id)->update([
            'name' => $request['permission_name'],
            'group_name' => $request['group_name'],
        ]);

        // Notification
        $notification = array(
            'message' => 'Permission updated successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('permissions.index')->with($notification);
    }

    // Permission Delete
    public function delete($id): RedirectResponse
    {
        // Delete the permission
        Permission::findorFail($id)->delete();

        // Notification
        $notification = array(
            'message' => 'Permission deleted successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('permissions.index')->with($notification);
    }

    // Permission Import
    public function import(): View
    {
        return view('backend.permissions.import');
    }
}
