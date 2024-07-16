<?php

namespace App\Http\Controllers\Homeowner;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    // Show the list of bookings
    public function index()
    {
        $bookings = Booking::where('homeowner_id', auth()->id())->latest()->get();
        return view('homeowner.bookings.index', compact('bookings'));
    }
    // Create a booking
    public function create()
    {
        $services = ServiceType::all();
        $domesticworkers = User::where('role', 'domestic_worker')->get();
        $homeowner = auth()->user();
        return view('homeowner.bookings.create',
            compact('services', 'domesticworkers', 'homeowner'));
    }
    // Store the booking
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'service_type_id' => 'required',
            'domestic_worker_id' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
        ]);

        // Create a new booking
        $booking = new Booking();
        $booking->homeowner_id = $request->homeowner_id;
        $booking->service_type_id = $request->service_type_id;
        $booking->domestic_worker_id = $request->domestic_worker_id;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->status = 'pending';

        // Save the booking
        $booking->save();

        // Send notification to homeowner
        $notification = [
            'message' => 'Booking created successfully',
            'alert-type' => 'success'
        ];

        // Redirect to the bookings page
        return redirect()->route('homeowner.bookings.index')->with($notification);
    }
    // Delete a booking
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        // Get the booking
        $booking = Booking::findOrFail($id);

        // Delete the booking
        $booking->delete();

        // Send notification
        return redirect()->back()->with('success', 'Booking deleted successfully');
    }
}
