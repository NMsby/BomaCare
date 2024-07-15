<?php

namespace App\Http\Controllers;

use App\Events\BookingAccepted;
use App\Events\BookingCompleted;
use App\Events\BookingLocationUpdated;
use App\Events\BookingStarted;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Validate the booking request
        $request->validate([
            'bookingDate' => 'required|date',
            'bookingTime' => 'required|date_format:H:i',
            'origin' => 'required',
            'destination' => 'required',
            'destinationName' => 'required',
        ]);

        return $request->user()->bookings()->create($request->only([
            'bookingDate',
            'bookingTime',
            'origin',
            'destination',
            'destinationName',
        ]));
    }

    public function show(Request $request, Booking $booking): Booking|JsonResponse
    {
        // Is the booking associated with the user?
        if ($booking->user->id === $request->user()->id) {
            return $booking;
        }

        // Check if the booking has a domestic worker and a homeowner
        if ($booking->domesticworker && $request->user()->id) {

            // Is the booking associated with the domestic worker?
            if ($booking->domesticworker->id === $request->user()->id) {
                return $booking;
            }
        }

        // If not, return an error
       return response()->json([
                'message' => 'Cannot find this booking',
            ], 404);
    }

    public function accept(Request $request, Booking $booking): Booking|JsonResponse
    {
        // Validate the booking request
        $request->validate([
            'domesticworker_location' => 'required',
        ]);

       // Domesticworker accepts a booking
        $booking->update([
            'domesticworker_id' => $request->user()->id,
            'domesticworker_location' => $request->domesticworker_location,
            'isAccepted' => true,
        ]);

        $booking->load('domesticworker.user');

        BookingAccepted::dispatch($booking, $request->user());

        return $booking;
    }

    public function start(Request $request, Booking $booking): Booking
    {
        // Domesticworker starts a booking appointment
        $booking->update([
            'isStarted' => true,
        ]);

        $booking->load('domesticworker.user');

        BookingStarted::dispatch($booking, $request->user());

        return $booking;
    }

    public function end(Request $request, Booking $booking): Booking
    {
        // Domesticworker ends a booking appointment
        $booking->update([
            'isCompleted' => true,
        ]);

        $booking->load('domesticworker.user');

        BookingCompleted::dispatch($booking, $request->user());

        return $booking;
    }

    public function location(Request $request, Booking $booking): Booking
    {
        // Validate the booking request
        $request->validate([
            'domesticworker_location' => 'required',
        ]);

        // Update the location of the domestic worker
        $booking->update([
            'domesticworker_location' => $request->domesticworker_location,
        ]);

        // Load the domestic worker user
        $booking->load('domesticworker.user');

        BookingLocationUpdated::dispatch($booking, $request->user());

        // Return the booking
        return $booking;
    }
}
