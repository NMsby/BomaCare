<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\LoginNeedsVerification;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the phone number
        $request->validate([
            'phone_number' => 'required|numeric|min:10|unique:users',
        ]);

        // Find the user by phone number or create a new user
        $user = User::firstOrCreate([
            'phone_number' => $request->phone_number,
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'Could not process a user with the provided phone number',
            ], 401);
        }

        // Now we need to send the user a login code
        $user->notify(new LoginNeedsVerification());

        // Return a success message
        return response()->json([
            'message' => 'Login code sent successfully',
        ]);
    }

    public function verify(Request $request)
    {
        // Validate the login code
        $request->validate([
            'phone_number' => 'required|numeric|min:10',
            'login_code' => 'required|numeric|between:1000,9999',
        ]);

        // Find the user by phone number
        $user = User::where('phone_number', $request->phone_number)
            ->where('login_code', $request->login_code)->first();

        // Is the code provided the one saved?


        // If the code is correct, return an auth token
        if ($user) {
            // Clear the login code
            $user->update([
                'login_code' => null,
            ]);
            // Return the auth token
            return $user->createToken($request->login_code)->plainTextToken;
        }

        // If not return an error message
        return response()->json([
            'message' => 'Invalid login code',
        ], 401);
    }
}
