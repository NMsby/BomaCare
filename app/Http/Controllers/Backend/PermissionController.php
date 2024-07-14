<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PermissionsExport;
use App\Http\Controllers\Controller;
use App\Imports\PermissionsImport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    // Permission Index
    public function index(): View
    {
        $permissions = Permission::all();
        return view('backend.permissions.index', compact('permissions'));
    } // End Index

    // Permission Create
    public function create():View
    {
        return view('backend.permissions.create');
    } // End Create

    // Permission Store
    public function store(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'permission_name' => 'required',
            'group_name' => 'required',
        ]);

        // Create a new permission
            Permission::create([
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
    } // End Store

    // Permission Edit
    public function edit($id): View
    {
        $permission = Permission::findorFail($id);
        return view('backend.permissions.edit', compact('permission'));
    } // End Edit

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
    } // End Update

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
    } // End Delete

    // Permission Import
    public function import(): View
    {
        return view('backend.permissions.import');
    }

    // Permission Export
    public function export(): object
    {
        return Excel::download(new PermissionsExport, 'permissions.xlsx');
    }

    // Permission Upload
    public function upload(Request $request): RedirectResponse
    {
        // Validate the request
        $request->validate([
            'import_file' => 'required|mimes:xlsx',
        ]);

        // Get the file
        $file = $request->file('import_file');

        // Import the file
        Excel::import(new PermissionsImport, $file);

        // Notification
        $notification = array(
            'message' => 'Permissions imported successfully',
            'alert-type' => 'success'
        );

        // Redirect to the index page
        return redirect()->route('permissions.index')->with($notification);
    }
}
