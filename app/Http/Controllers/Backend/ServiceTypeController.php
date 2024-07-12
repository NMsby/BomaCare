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
            'service-type_name' => 'required|string|unique:service_types|max:200',
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
}
