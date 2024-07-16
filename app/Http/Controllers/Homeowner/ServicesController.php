<?php

namespace App\Http\Controllers\Homeowner;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // Show the services page
    public function index()
    {
        $services = ServiceType::latest()->get();
        return view('homeowner.services', compact('services'));
    }

    // View the service details page
    public function view($id)
    {
        $service = ServiceType::findOrFail($id);
        return view('homeowner.services.view', compact('service'));
    }

    // Book a service
    public function book(Request $request)
    {
        // Validate request
        $request->validate([
            'service_id' => 'required|exists:service_types,id',
            'date' => 'required|date',
            'time' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        // Create new booking
        $booking = new Booking();

        // Assign values
        $booking->service_id = $request->service_id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->address = $request->address;
        $booking->city = $request->city;
        $booking->state = $request->state;
        $booking->zip = $request->zip;
        $booking->homeowner_id = auth()->id();
        $booking->status = 'pending';

        // Save booking
        $booking->save();

        // Redirect to services page
        return redirect()->route('homeowner.services')->with('success', 'Service booked successfully!');
    }
}
