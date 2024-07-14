<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsController extends Controller
{
    // View Permissions Assigned to Roles
    public function index(): View
    {
        $roles = Role::all();
        return view('backend.role-permissions.index', compact('roles'));
    }

    // Permission Assign to Role View
    public function create(): View
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.role-permissions.create', compact('permissions', 'roles', 'permission_groups'));
    }

    // Permission Assign to Role Store
    public function store(Request $request): RedirectResponse
    {
        // Validate Request
        $request->validate([
            'role_id' => 'required',
            'permission' => 'required',
        ]);

        // Get the permissions
        $data = array();
        $permissions = $request['permission'];

        // Assign the permissions to the role
        foreach ($permissions as $item) {
            $data['role_id'] = $request['role_id'];
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        // Notification
        $notification = array(
            'message' => 'Permissions assigned to role successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('role-permissions.index')->with($notification);
    }

    // Role Permission Edit
    public function edit($id): View
    {
        $role = Role::findorFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.role-permissions.edit', compact('role', 'permissions', 'permission_groups'));
    }

    // Role Permission Update
    public function update(Request $request, $id): RedirectResponse
    {
        // Get the role
        $role = Role::findorFail($id);
        // Get the permissions
        $permissions = $request['permission'];

        // Sync the permissions
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        // Notification
        $notification = array(
            'message' => 'Permissions updated successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('role-permissions.index')->with($notification);
    }

    // Role Permission Delete
    public function delete($id): RedirectResponse
    {
        // Get the role
        $role = Role::findorFail($id);

        // Delete the role
        if (!is_null($role)) {
            $role->delete();
        }

        // Notification
        $notification = array(
            'message' => 'Role deleted successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('role-permissions.index')->with($notification);

    }

}
