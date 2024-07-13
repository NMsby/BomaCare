<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ServiceType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceTypeController extends Controller
{
    // Service Type Index
    public function index(): View
    {
        $serviceTypes = ServiceType::latest()->get();
        return view('backend.service-type.index', compact('serviceTypes'));
    } // End of Service Type Index

    // Service Type Create
    public function create(): View
    {
        return view('backend.service-type.create');
    } // End of Service Type Create

    // Service Type Store
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'service-type_name' => 'required|string|unique:service_types|max:100',
            'service-type_description' => 'required|string|max:255',
            'service-type_price' => 'required|numeric|min:0',
            'service-type_image' => 'required|max:2048',
        ]);

        $imagePath = '';

        // Check if image is uploaded  // TO BE FIXED
        if ($request->hasFile('service-type_image')) {
            $image = $request->file('service-type_image');
            $imageName = date('YmdHis') . '-' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/service-types/'), $imageName);
            $imagePath = 'uploads/service-types/' . $imageName;
        }

        // Insert Service Type into Database
        ServiceType::create([
            'service-type_name' => $request['service-type_name'],
            'service-type_description' => $request['service-type_description'],
            'service-type_price' => $request['service-type_price'],
            'service-type_image' => $imagePath,
        ]);

        // Notification
        $notification = array(
            'message' => 'Service Type Created Successfully',
            'alert-type' => 'success'
        );

        // Redirect to Service Type Index
        return redirect()->route('service-type.index')->with($notification);

    } // End of Service Type Store

    // Service Type Edit
    public function edit($id): View
    {
        $serviceType = ServiceType::findOrFail($id);
        return view('backend.service-type.edit', compact('serviceType'));
    } // End of Service Type Edit

    // Service Type Update
    public function update(Request $request): RedirectResponse
    {
        // Validate Request
        $request->validate([
            'service-type_name' => 'required|string|max:100',
            'service-type_description' => 'required|string|max:255',
            'service-type_price' => 'required|numeric|min:0',
            'service-type_image' => 'required|max:2048',
        ]);

        $imagePath = $request['service-type_image'];
        // Check if image is uploaded
        if ($request->hasFile('service-type_image')) {
            $image = $request->file('service-type_image');
            $imageName = date('YmdHis') . '-' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/service-types/'), $imageName);
            $imagePath = 'uploads/service-types/' . $imageName;
        }

        // Update Service Type
        $id = $request['id'];
        $serviceType = ServiceType::findOrFail($id)->update([
            'service-type_name' => $request['service-type_name'],
            'service-type_description' => $request['service-type_description'],
            'service-type_price' => $request['service-type_price'],
            'service-type_image' => $imagePath,
        ]);

        // Notification
        $notification = array(
            'message' => 'Service Type Updated Successfully',
            'alert-type' => 'success'
        );

        // Redirect to Service Type Index
        return redirect()->route('service-type.index')->with($notification);
    } // End of Service Type Update

    // Service Type Delete
    public function destroy($id): RedirectResponse
    {
        // Delete Service Type
        ServiceType::findOrFail($id)->destroy($id);

        // Notification
        $notification = array(
            'message' => 'Service Type Deleted Successfully',
            'alert-type' => 'success'
        );

        // Redirect to Service Type Index
        return redirect()->route('service-type.index')->with($notification);
    } // End of Service Type Delete
}
