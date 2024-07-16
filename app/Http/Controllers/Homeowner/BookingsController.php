<?php

namespace App\Http\Controllers\Homeowner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    // Show the list of bookings
    public function index()
    {
        $bookings = auth()->user()->bookings;
        return view('homeowner.bookings.index');
    }
    // Create a booking
    public function create()
    {
        $
        return view('homeowner.bookings.create');
    }
    // Show the form to create a booking
    // Store the booking
    // Show the booking
}
