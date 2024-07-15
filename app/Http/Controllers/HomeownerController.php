<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\ServiceType; // Assuming you have a ServiceType model
use App\Models\Review; // Assuming you have a Review model

class HomeownerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply 'auth' middleware to all methods in this controller
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function showPayments()
    {
        return view('payments.payments');
    }

    public function requestService()
    {
        return view('homeowner.request-service');
    }

    public function storeServiceRequest(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'service_type' => 'required|exists:service_types,id',
        'description' => 'required|string|max:1000',
    ]);

    // Store the service request
    $serviceRequest = ServiceRequest::create([
        'homeowner_id' => auth()->id(),
        'service_type_id' => $validated['service_type'],
        'description' => $validated['description'],
        'status' => 'pending', // or whatever initial status you want
    ]);

    // Redirect back with a success message
    return redirect()->route('dashboard')->with('success', 'Service request submitted successfully!');
}

    public function allServices()
    {
        $services = ServiceType::all(); // Fetch all service types
        return view('homeowner.all-services', compact('services'));
    }

    public function reviews()
    {
        $reviews = Review::where('homeowner_id', auth()->id())->get(); // Fetch reviews for the logged-in homeowner
        return view('homeowner.reviews', compact('reviews'));
    }
}